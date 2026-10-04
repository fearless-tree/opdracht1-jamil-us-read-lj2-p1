<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voorraad extends Model
{
    protected $table = 'Magazijn';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = ['ProductId', 'VerpakkingsEenheidinKilogram', 'AantalAanwezig', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'ProductId', 'Id');
    }
}
