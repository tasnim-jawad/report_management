<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Bm\Income\BmCategoryUser;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgCityResponsible;
use App\Models\Organization\OrgCityUser;
use App\Models\Organization\OrgThanaResponsible;
use App\Models\Organization\OrgThanaUser;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\OrgWardUser;
use App\Models\User\ReportUploader;
use App\Models\User\UserClass;
use App\Models\User\UserContact;
use App\Models\User\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable ,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function user_role()                             //A user can have only one user_role
    {
        return $this->belongsTo(UserRole::class);
    }

    public function report_uploader()                       //A user can have only one report uploader id
    {
        return $this->hasOne(ReportUploader::class);
    }
    public function user_class()                            //A user can have only one user_class
    {
        return $this->hasOne(UserClass::class);
    }
    public function user_contact()                          //A user can have multiple contacts
    {
        return $this->hasMany(UserContact::class);
    }
    public function org_city_responsible()                  //A user can have multiple responsibilities
    {
        return $this->hasMany(OrgCityResponsible::class);
    }
    public function org_thana_responsible()
    {
        return $this->hasMany(OrgThanaResponsible::class);
    }
    public function org_ward_responsible()
    {
        return $this->hasMany(OrgWardResponsible::class);
    }
    public function org_unit_responsible()
    {
        return $this->hasMany(OrgUnitResponsible::class);
    }


    public function org_city_user()                         //A user can have only one org_city_user
    {
        return $this->hasOne(OrgCityUser::class);
    }
    public function org_thana_user()
    {
        return $this->hasOne(OrgThanaUser::class);
    }
    public function org_ward_user()
    {
        return $this->hasOne(OrgWardUser::class);
    }
    public function org_unit_user()
    {
        return $this->hasOne(OrgUnitUser::class);
    }

    public function bm_paid()
    {
        return $this->hasMany(BmPaid::class);
    }
    public function bm_category_user()
    {
        return $this->hasMany(BmCategoryUser::class);
    }
}
