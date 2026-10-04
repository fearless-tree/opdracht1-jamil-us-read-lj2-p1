<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Voorraad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MagazijnController extends Controller
{
    public function overzicht(): View
    {
        $producten = Product::where('IsActief', 1)
            ->with('voorraad')
            ->orderBy('Barcode')
            ->get();

        return view('magazijn.overzicht', compact('producten'));
    }

    public function leveringInfo(Product $product): View
    {
        abort_unless($product->IsActief, 404);
        $product->load('voorraad');
        $leveringen = $product->leveringen()
            ->with('leverancier')
            ->where('IsActief', 1)
            ->orderBy('DatumLevering')
            ->get();

        return view('magazijn.levering-info', compact('product', 'leveringen'));
    }

    public function allergenenInfo(Product $product): View
    {
        abort_unless($product->IsActief, 404);
        $allergenen = $product->allergenen()->wherePivot('IsActief', 1)->where('Allergeen.IsActief', 1)->get();

        return view('magazijn.allergenen-info', compact('product', 'allergenen'));
    }

    public function create(): View
    {
        return view('magazijn.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        $now = now();

        $product = Product::create([
            'Naam' => $validated['Naam'],
            'Barcode' => $validated['Barcode'],
            'IsActief' => 1,
            'DatumAangemaakt' => $now,
            'DatumGewijzigd' => $now,
        ]);

        Voorraad::create([
            'ProductId' => $product->Id,
            'VerpakkingsEenheidinKilogram' => $validated['VerpakkingsEenheidinKilogram'],
            'AantalAanwezig' => $validated['AantalAanwezig'] ?? null,
            'IsActief' => 1,
            'DatumAangemaakt' => $now,
            'DatumGewijzigd' => $now,
        ]);

        return redirect()->route('magazijn.overzicht')->with('status', 'Product aangemaakt.');
    }

    public function edit(Product $product): View
    {
        $product->load('voorraad');

        return view('magazijn.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, $product);

        $now = now();

        $product->update([
            'Naam' => $validated['Naam'],
            'Barcode' => $validated['Barcode'],
            'DatumGewijzigd' => $now,
        ]);

        $voorraad = Voorraad::where('ProductId', $product->Id)->first();

        if ($voorraad) {
            $voorraad->update([
                'VerpakkingsEenheidinKilogram' => $validated['VerpakkingsEenheidinKilogram'],
                'AantalAanwezig' => $validated['AantalAanwezig'] ?? null,
                'DatumGewijzigd' => $now,
            ]);
        } else {
            Voorraad::create([
                'ProductId' => $product->Id,
                'VerpakkingsEenheidinKilogram' => $validated['VerpakkingsEenheidinKilogram'],
                'AantalAanwezig' => $validated['AantalAanwezig'] ?? null,
                'IsActief' => 1,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]);
        }

        return redirect()->route('magazijn.overzicht')->with('status', 'Product bijgewerkt.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $now = now();

        $product->update(['IsActief' => 0, 'DatumGewijzigd' => $now]);

        Voorraad::where('ProductId', $product->Id)->update(['IsActief' => 0, 'DatumGewijzigd' => $now]);

        return redirect()->route('magazijn.overzicht')->with('status', 'Product verwijderd.');
    }

    private function validateProduct(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'Naam' => ['required', 'string', 'max:50'],
            'Barcode' => [
                'required', 'digits:13',
                Rule::unique('Product', 'Barcode')->ignore($product?->Id, 'Id'),
            ],
            'VerpakkingsEenheidinKilogram' => ['required', 'numeric', 'gt:0'],
            'AantalAanwezig' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
