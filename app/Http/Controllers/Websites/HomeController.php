<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\ClientSection;
use App\Models\ContactSection;
use App\Models\MembershipSection;
use App\Models\NavbarMenu;
use App\Models\ProductSection;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\TechnologySection;
use App\Models\TestimonialSection;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', 1)
            ->orderBy('order')
            ->get();

        $services = Service::where('is_active', 1)
            ->orderBy('order')
            ->get();

        $aboutSection = AboutSection::with([
            'content',
            'cards' => function ($q) {
                $q->where('is_active', 1)->orderBy('order');
            }
        ])->where('is_active', 1)->first();


        $techSection = TechnologySection::with([
            'items' => function ($q) {
                $q->where('is_active', 1)
                    ->orderBy('order');
            },
        ])
            ->where('is_active', 1)
            ->first();

        $productSection = ProductSection::with([
            'products' => function ($q) {
                $q->where('is_active', 1);
            },
        ])->where('is_active', 1)->first();

        $serviceSection = ServiceSection::with([
            'services' => function ($q) {
                $q->where('is_active', 1);
            },
        ])->where('is_active', 1)->first();

        $clientSection = ClientSection::with([
            'items' => function ($q) {
                $q->where('is_active', 1)
                    ->orderBy('order');
            },
        ])->where('is_active', 1)->first();

        $membershipSection = MembershipSection::with([
            'membershipCards' => fn($q) => $q->where('is_active', 1)->orderBy('order'),
        ])->where('is_active', 1)->first();

        $navbarMenus = NavbarMenu::where('is_active', 1)->orderBy('order')->get();

        $socialLinks = SocialLink::where('is_active', 1)
            ->orderBy('order')
            ->get();

        $contactSection = ContactSection::where('is_active', 1)->first();

        $testimonialSection = TestimonialSection::with([
            'testimonials' => function ($q) {
                $q->where('is_active', 1)
                    ->orderBy('order');
            },
        ])
            ->where('is_active', 1)
            ->first();


        // compact এর ভেতর সবগুলোর নাম কোটেশনের ভেতর দিন
        return view('websites.home', compact(
            'sliders',
            'services',
            'aboutSection',
            'techSection',
            'productSection',
            'serviceSection',
            'clientSection',
            'membershipSection',
            'navbarMenus',
            'socialLinks',
            'contactSection',
            'testimonialSection'
        ));
    }
}

