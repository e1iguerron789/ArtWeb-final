use App\Repositories\EventoRepository;
use App\Services\EventoRecomendadorService;
use App\Recomendacion\Reglas\ReglaInteresExacto;
use App\Recomendacion\Reglas\ReglaNombreInteres;
use App\Recomendacion\Reglas\ReglaDistancia;

public function register(): void
{
    $this->app->singleton(EventoRecomendadorService::class, function ($app) {
        return new EventoRecomendadorService(
            $app->make(EventoRepository::class),
            [
                new ReglaInteresExacto(),
                new ReglaNombreInteres(),
                new ReglaDistancia(),
            ]
        );
    });
}
