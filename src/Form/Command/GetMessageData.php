<?php namespace Anomaly\ContactPlugin\Form\Command;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Robbo\Presenter\Decorator;

/**
 * Class GetMessageData
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ContactPlugin\Form\Command
 */
class GetMessageData implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var FormBuilder
     */
    protected $builder;

    /**
     * Create a new GetMessageData instance.
     *
     * @param FormBuilder $builder
     */
    public function __construct(FormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param Decorator $decorator
     * @return array
     */
    public function handle(Decorator $decorator)
    {
        $data = [];

        $data['form']   = $this->builder->getFormPresenter();
        $data['fields'] = $decorator->decorate($this->builder->getFormFields());

        return $data;
    }
}