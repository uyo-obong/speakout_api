<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Jiggle\Modules\Account\Models\Role;
use Jiggle\Modules\Account\Models\User;
use Jiggle\Modules\Account\Models\UserRole;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $uuid1 = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random(5));
            User::updateOrCreate([
                "first_name"=>"Jiggle",
                "last_name"=>"Admin",
                "email"=>'admin@jiggle.ng',
                "password"=>bcrypt("password"),
                "account_no"=> date('ym').rand(000000,999999),
                "verified"=>true,
                "role_id"=>Role::where("name","admin")->first()->id,
            ],[  "id"=>$uuid1,]);
        } catch (UnsatisfiedDependencyException $e) {
            print  'Error Generating Uuid';
        }

    }
}
