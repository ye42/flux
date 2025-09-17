# Flux (Custom Fork)

Flux is a robust, hand-crafted UI component library for [Livewire](https://livewire.laravel.com) applications. It's built using [Tailwind CSS](https://tailwindcss.com) and provides a set of components that are easy to use and customize.

**Note:** This is a custom fork (`ye42/flux`) and does not support the Pro version features.

You can view the components in action at [https://fluxui.dev](https://fluxui.dev).

## Prerequisites

Flux requires the following before installing:

* Laravel v10.0+
* Livewire v3.5.19+
* Tailwind CSS v4.0+

## Installation

Run the following command from your project's root directory:

```bash
composer require ye42/flux
```

## Getting Started

### 1. Include Flux Assets

Add the `@fluxAppearance` and `@fluxScripts` Blade directives to your layout file:

```html
<head>
    ...
    @fluxAppearance
</head>

<body>
    ...
    @fluxScripts
</body>
```

### 2. Set up Tailwind CSS

Flux uses Tailwind CSS for its default styling. Add the following configuration to your `resources/css/app.css` file:

```css
@import 'tailwindcss';
@import '../../vendor/livewire/flux/dist/flux.css';

@custom-variant dark (&:where(.dark, .dark *));
```

If you don't have Tailwind installed, you can learn how to install it on the [Tailwind website](https://tailwindcss.com/docs/guides/laravel).

### 3. Use the Inter Font Family (Optional)

We recommend using the [Inter font family](https://rsms.me/inter). Add the following to your layout file:

```html
<head>
    ...
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
</head>
```

Configure Tailwind to use this font in your `resources/css/app.css`:

```css
@import 'tailwindcss';
@import '../../vendor/livewire/flux/dist/flux.css';

...

@theme {
    --font-sans: Inter, sans-serif;
}
```

## What's included?

The following components are included in the `ye42/flux` package:
* [Button](https://fluxui.dev/components/button)
* [Dropdown](https://fluxui.dev/components/dropdown)
* [Icon](https://fluxui.dev/components/icon)
* [Separator](https://fluxui.dev/components/separator)
* [Tooltip](https://fluxui.dev/components/tooltip)

**Note:** This custom fork (`ye42/flux`) does not include Pro components and does not support Pro features. Only the free components listed above are available.

## Customization

To customize specific Flux components, publish their blade files using:

```bash
php artisan flux:publish
```

You'll be prompted to select which components to publish, or use `--all` to publish everything.

## Keeping Updated

To ensure you have the latest version of Flux, regularly update your dependencies:

```bash
composer update ye42/flux
```

For more detailed documentation and guides, visit [https://fluxui.dev/docs](https://fluxui.dev/docs).
