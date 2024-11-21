<?php

use Workbench\App\Component;

it('can set a string label', function () {
    $component = new Component;
    $component->setLabel($l = 'Label');
    expect($component->getLabel())->toBe($l);
});

it('can set a closure label', function () {
    $component = new Component;
    $component->setLabel(fn () => 'Label');
    expect($component->getLabel())->toBe('Label');
});

it('prevents null values', function () {
    $component = new Component;
    $component->setLabel(null);
    expect($component->missingLabel())->toBeTrue();
});

it('can chain label', function () {
    $component = new Component;
    expect($component->label($l = 'Label'))->toBeInstanceOf(Component::class);
    expect($component->getLabel())->toBe($l);
});

it('checks for label', function () {
    $component = new Component;
    expect($component->hasLabel())->toBeFalse();
    $component->setLabel('Label');
    expect($component->hasLabel())->toBeTrue();
});

it('checks for no label', function () {
    $component = new Component;
    expect($component->missingLabel())->toBeTrue();
    $component->setLabel('Label');
    expect($component->missingLabel())->toBeFalse();
});

it('converts text to a label', function () {
    $label = (new Component)->makeLabel('new-Label');
    expect($label)->toBe('New label');
});
