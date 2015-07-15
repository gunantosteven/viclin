<?php namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Beli extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'beli';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nobeli', 'idsupp', 'user', 'tglorderbeli', 'tgltempobeli', 'biayaexspbeli', 'biayasusutbeli', 'biayakarantina', 'biayaclearance', 'biayaimpor', 'biayalab', 'biayafreight', 'cif', 'bm', 'pph', 'storage', 'trmc', 'spc', 'time', 'dokumen', 'ppn' ,'stamp' ,'handling', 'over', 'adm' ,'edi' ,'rush', 'tglfaktur'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];
}