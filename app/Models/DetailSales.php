<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSales extends Model
{
    use HasFactory;
    protected $table = 'detail_sales';
    protected $fillable = ['sale_id', 'product_id', 'qty', 'sub_total'];
}
