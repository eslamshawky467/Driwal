<?php

namespace App\Providers;

use App\Repositries\ZoneRepositry;
use App\Repositries\AdminRepository;
use App\Repositries\BannerRepository;
use App\Repositries\ClientRepository;
use App\Repositries\DriverRepository;
use App\Repositries\PackageRepositry;
use App\Repositries\CarTypeRepository;
use App\Repositries\CompanyRepository;
use App\Repositries\RequestRepository;
use App\Repositries\SettingRepository;
use App\Repositries\CarModelRepository;
use App\Repositries\CostRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ZoneRepositryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Repositries\AdvertisementRepository;
use App\Repositries\ClientAccountRepository;
use App\Repositries\DriversAccountRepositry;
use App\Interfaces\BannerRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\DriverRepositoryInterface;
use App\Interfaces\PackageRepositryInterface;
use App\Interfaces\CarTypeRepositoryInterface;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\RequestRepositoryInterface;
use App\Interfaces\SettingRepositoryInterface;
use App\Interfaces\CarModelRepositoryInterface;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\ClientAccountRepositoryInterface;
use App\Interfaces\DriversAccountRepositryInterface;
use App\Interfaces\CostRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Repositries\OrderRepository;



class RepositryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    $this->app->bind(RequestRepositoryInterface::class, RequestRepository::class);
    $this->app->bind(PackageRepositryInterface::class, PackageRepositry::class);
    $this->app->bind(ZoneRepositryInterface::class, ZoneRepositry::class);
    $this->app->bind(DriversAccountRepositryInterface::class, DriversAccountRepositry::class);
    $this->app->bind(ClientAccountRepositoryInterface::class, ClientAccountRepository::class);
    $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    $this->app->bind(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
    $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
    $this->app->bind(DriverRepositoryInterface::class, DriverRepository::class);
    $this->app->bind(CarTypeRepositoryInterface::class, CarTypeRepository::class);
    $this->app->bind(CarModelRepositoryInterface::class, CarModelRepository::class);
    $this->app->bind(CostRepositoryInterface::class, CostRepository::class);
    $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

}
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
