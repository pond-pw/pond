<?php

declare(strict_types=1);


namespace Pond\CommandBus;

use Psr\Container\ContainerInterface;

class HandlerCommandMapping
{
    private array $mapping = [];

    private ContainerInterface $serviceManager;

    public function __construct(ContainerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function add(string $commandClassName, string $handlerClassName)
    {
        $this->mapping[$commandClassName] = $handlerClassName;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command)
    {
        try {
            $commandHandler = $this->getHandlerForCommand($command);
            if(!$commandHandler->canHandle($command)) {
               throw new MappingIsWrongException(get_class($command), get_class($commandHandler));
            }
            $result = $commandHandler->handle($command);
            $this->triggerHandledEvent($result);
        } catch (\Exception $e) {
            $this->triggerHandlingErrorEvent($command);
        }

    }

    public function getHandlerForCommand(CommandInterface $command) : CommandHandlerInterface
    {
        $commandClassName = get_class($command);
        if(in_array($commandClassName, $this->mapping)) {
            return $this->serviceManager->get($this->mapping[$commandClassName]);
        }
        throw new NoHandlerFoundForCommand(get_class($command));
    }

    public function triggerHandledEvent (CommandResultInterface $result)
    {
        if($result instanceof SuccessResult) {
            $this.
        } else if ($result instanceof  ErrorResult) {

        }
    }

    public function triggerHandlingResultedErrorEvent(CommandInterface $command)
    {

    }


}   