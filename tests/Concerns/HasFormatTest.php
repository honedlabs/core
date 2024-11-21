<?php

use Workbench\App\Component;

it('can set a string format', function () {
    $component = new Component;
    $component->setFormat($f = 'd M Y');
    expect($component->getFormat())->toBe($f);
});

it('prevents null values', function () {
    $component = new Component;
    $component->setFormat(null);
    expect($component->missingFormat())->toBeTrue();
});

it('can set a closure format', function () {
    $component = new Component;
    $component->setFormat(fn () => 'd M Y');
    expect($component->getFormat())->toBe('d M Y');
});

it('can chain format', function () {
    $component = new Component;
    expect($component->format($f = 'd M Y'))->toBeInstanceOf(Component::class);
    expect($component->getFormat())->toBe($f);
});

it('checks for format', function () {
    $component = new Component;
    expect($component->hasFormat())->toBeFalse();
    $component->setFormat('d M Y');
    expect($component->hasFormat())->toBeTrue();
});

it('checks for no format', function () {
    $component = new Component;
    expect($component->missingFormat())->toBeTrue();
    $component->setFormat('d M Y');
    expect($component->missingFormat())->toBeFalse();
});
