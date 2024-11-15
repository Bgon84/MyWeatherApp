# My Weather App

This is a simple weather application built with Laravel and Livewire. It utilizes [Weather API](https://www.weatherapi.com/) to retrieve weather data for a given location string. 

## Installation
After cloning this repo, navigate to the root folder and perform the following commands:

```
composer install
npm ci
npm run build
```

Clone the example .env file into your own. 

```
cp .env.example .env
vi .env
```

Set *WEATHER_API_KEY* to your API Key from [Weather API](https://www.weatherapi.com/).

Generate an App Key and start the server:

```
php artisan key:generate
php artisan serve
```

To capture asset (javascript/css) changes, run the following command as well:

```
npm run dev
```

## Usage
### Register
An account is required to use the application. On the Login Page, click on "Need an Account?" below the Login button. Fill in the form and click the Register button. You'll automatically be logged in and taken to Your Weather.

### Weather
To get weather information, simply input a location into the search bar and click the Get Weather button. You may enter a zip code, full City and State, or even partial location names. If your location is not found, you will see only an error message. 

### Preferences
Navigate to Preferences via the dropdown navigation menu or the top navigation bar. Here you can define your Favorite location (will load automatically upon login) as well as you're preferred units of measure. Simply enter your favorite location, make your selections and click the Save button.

### Account
Navigate to Account via the dropdown navigation menu or the top navigation bar. Here you can update your name and email, change your password, or delete your account.

## Support
Please contact Bryan at [Bgontkovsky@gmail.com](mailto:Bgontkovsky@gmail.com) for any questions or concerns.