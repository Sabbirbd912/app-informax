<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\NavbarMenu;
use App\Models\SocialLink;
use App\Models\ServiceSection;

class AboutPageController extends Controller
{
    public function index()
    {


        $aboutSection = AboutSection::with([
            'content',
            'cards' => function ($q) {
                $q->where('is_active', 1)->orderBy('order');
            }
        ])->where('is_active', 1)->first();

        $navbarMenus = NavbarMenu::where('is_active', 1)->orderBy('order')->get();

        $socialLinks = SocialLink::where('is_active', 1)
            ->orderBy('order')
            ->get();

        $serviceSection = ServiceSection::with([
            'services' => function ($q) {
                $q->where('is_active', 1);
            },
        ])->where('is_active', 1)->first();
        // compact এর ভেতর সবগুলোর নাম কোটেশনের ভেতর দিন
        return view('websites.pages.about-page', compact(
            'aboutSection',
            'navbarMenus',
            'socialLinks',
            'serviceSection'


        ));
    }
}

