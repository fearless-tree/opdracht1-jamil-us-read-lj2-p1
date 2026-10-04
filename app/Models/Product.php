<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = 'Product';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $casts = ['IsActief' => 'boolean'];

    protected $fillable = ['Naam', 'Barcode', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function voorraad(): HasOne
    {
        return $this->hasOne(Voorraad::class, 'ProductId', 'Id');
    }

    public function allergenen(): BelongsToMany
    {
        return $this->belongsToMany(Allergeen::class, 'ProductPerAllergeen', 'ProductId', 'AllergeenId')
            ->orderBy('Naam');
    }

    public function leveringen(): HasMany
    {
        return $this->hasMany(Levering::class, 'ProductId', 'Id');
    }
}
