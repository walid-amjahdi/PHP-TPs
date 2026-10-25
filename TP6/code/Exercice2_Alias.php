<?php
// Simulation des classes d'origine.
namespace Core\Utils\Debug {
    class Logger {}
}

namespace Vendor\Log\External {
    class Logger {}
}

namespace App\Controller {
    use Core\Utils\Debug\Logger;
    use Vendor\Log\External\Logger as ExternalLogger;

    $localLogger = new Logger();
    $extLogger = new ExternalLogger();

    echo "Les deux loggers ont été instanciés avec succès !";
}
