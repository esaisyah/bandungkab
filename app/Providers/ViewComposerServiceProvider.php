<?php

namespace App\Providers;

use App\Article;
use App\MenuItem;
use App\Profile;
use Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeBackendMainmenu();
        $this->composeFrontendMainmenu();
        $this->composePemimpinSidemenu();
        $this->composeLatestNews();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose backend's main menu
     */
    private function composeBackendMainmenu()
    {
        view()->composer('backend.partials.mainmenu', function ($view) {
            $view->with('superadminMainMenuItems', MenuItem::where('menu_id', 'menu_superadmin')
                ->where('parent_id', '0')
                ->orderBy('urutan', 'asc')
                ->get())
                ->with('adminMainMenuItems', MenuItem::where('menu_id', 'menu_bag_admin')
                    ->where('parent_id', '0')
                    ->orderBy('urutan', 'asc')
                    ->get())
                ->with('pendaftaranMainMenuItems', MenuItem::where('menu_id', 'menu_bag_pendaftaran')
                    ->where('parent_id', '0')
                    ->orderBy('urutan', 'asc')
                    ->get()
                );
        });
    }

    /**
     * Compose frontend's main menu
     */
    private function composeFrontendMainmenu()
    {
        view()->composer('frontend.partials.mainmenu', function ($view) {
            $allIMenuItems = MenuItem::where('menu_id', 'menu_frontend_mainmenu')
                ->orderBy('urutan', 'asc')
                ->get();
            $mainMenuItems = [];
            foreach($allIMenuItems as $menu){
                $mainMenuItems[$menu->parent_id][] = $menu;
            }
            $view->with('mainMenuItems', $mainMenuItems);
        });
    }

    /**
     * Compose pimpinan daerah menu
     */
    private function composePemimpinSidemenu()
    {
        view()->composer('frontend.partials.pemimpin_menu', function ($view) {
            $view->with('pemimpinMenuItems', Profile::orderBy('id', 'asc')->get());
        });
    }

    /**
     * Compose latest news
     */
    private function composeLatestNews()
    {
        view()->composer('frontend.partials.latest_news', function ($view) {
            $view->with('latestNews', Article::orderBy('created_at', 'desc')->take(4)->get());
        });
    }
}
