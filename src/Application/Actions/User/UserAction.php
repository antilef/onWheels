<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\Employee\EmployeeRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    /**
     * @var EmployeeRepository
     */
    protected $userRepository;

    /**
     * @param LoggerInterface $logger
     * @param EmployeeRepository  $userRepository
     */
    public function __construct(LoggerInterface $logger, EmployeeRepository $userRepository)
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
    }
}
