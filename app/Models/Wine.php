<?php

namespace App\Models;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;


    public function categories()
    {
        return $this->belongsTo(Category::class);

    }

  /*  protected $fillable= [
        'name',
        'company',
        'email',
        'subject',
        'message',
        'countries_id',
        'created_at'

    ];
*/
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function denominations()
    {
        return $this->belongsTo(Denomination::class, 'denomination_id');
    }

    public static function type($type)
    {
        return self::where('type' , '=' , $type);
    }

    public static function price($price)
    {
        return self::where('price' , '>' , $price);
    }

    public static function paistipo($id_country, $type)
    {
        return self::where('country_id' , '>' , $id_country)
                    ->where('type' , '=' , $type);
    }

}
