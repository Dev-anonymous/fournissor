<?php


use App\Models\Appconfig;
use App\Models\Category;
use App\Models\Config;
use App\Models\User;

function v($v, $append = '')
{
    return number_format($v, 2, '.', ' ') . ($append ? " $append" : '');
}

function nnow()
{
    return now('Africa/Lubumbashi');
}

function defaultdata()
{
    $u = User::where('user_role', 'admin')->first();
    if (!$u) {
        User::create(['name' => 'Admin', 'email' => 'admin@admin.admin', 'user_role' => 'admin', 'password' => Hash::make('admin@2024')]);
    }

    $u = Appconfig::first();
    if (!$u) {
        Appconfig::create(['tel' => '+243999999999', 'email' => 'contact@fournissor.com', 'adresse' => 'Lubumbashi, DRC', 'description' => 'La Plateforme de Prestation de Service de Construction représente un outil incontournable pour tous ceux qui souhaitent réaliser des projets de construction ou de rénovation. En mettant en relation des clients et des prestataires de manière efficace et transparente, nous contribuons à transformer le secteur de la construction en rendant les services plus accessibles et fiables.']);
    }
    $u = Category::all();
    if (!count($u)) {
        foreach (['Construction' => 'Lorem ipsum'] as $k => $v)
            Category::create(['category' => $k, 'description' => $v]);
    }
}

function isvalidenumber($phone)
{
    return in_array(substr($phone, 0, 3), ['099', '097', '098', '090', '081', '082', '083', '084', '085', '080', '086', '089']);
}

function getconfig($name)
{
    $conf = json_decode(@Config::first()->config ?? '[]');
    if (isset($conf->{$name})) {
        return $conf->{$name};
    }
    return null;
}

function setconfig($name, $value)
{
    if ($name and $value) {
        $conf = (object) json_decode(@Config::first()->config ?? '[]');
        $conf->{$name} = $value;

        $o = Config::first();
        if ($o) {
            $o->update(['config' => json_encode($conf)]);
        } else {
            Config::create(['config' => json_encode($conf)]);
        }
    }
}

function userimage($user)
{
    $img = $user?->image;
    if ($img) {
        $img =   asset('storage/' . $img);
    } else {
        $img =   asset('/assets/images/faces/9.jpg');
    }
    return $img;
}

function getappconfig()
{
    return Appconfig::first();
}
