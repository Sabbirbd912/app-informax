<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutCard;
use App\Models\ClientItem;
use App\Models\ContactMessage;
use App\Models\SocialLink;
use App\Models\TechnologyItem;
use App\Models\User;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Product;
use App\Models\NavbarMenu;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'messages' => ContactMessage::count(),
            'clients' => ClientItem::count(),
            'navbars' => NavbarMenu::count(),
            'about' => AboutCard::count(),
            'technologys'=>TechnologyItem::count(),
            'sliders' => Slider::where('is_active', 1)->count(),
            'services' => Service::where('is_active', 1)->count(),
            'products' => Product::where('is_active', 1)->count(),
            'socials' => SocialLink::where('is_active', 1)->count(),
        ];

        return view('adminpanel.dashboard.index', compact('stats'));
    }
}
