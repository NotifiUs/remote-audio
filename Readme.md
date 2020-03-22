# Remote Audio

Remote Audio is a simple browser-based soft phone powered by Twilio's Client.js SDK. 

## General

The specific use-case is for call centers and answering services that need to quickly on-board remotes who must establish a call over the PSTN to their switch.

The goal is to get them up and running fast with minimal hassle by the agent or the organization.

This is generally not the cheapest option in the long run, but can be used as a backup or stop-gap measure effectively. 

## Pre-requisites

### Twilio

You'll need the following to get started:

- A Twilio account
- A TwiML Application
- A Twilio verified caller ID number

Next, you'll need to configure a server-side integration to validate the Twilio client's capabilities.

You can use the Function template for `Twilio Client Quickstart` as a starting point. 

> Advanced users can write their own capability token endpoints with custom logic

When creating the Function using the quick-start, you'll fill in the TwiML App SID and your verified caller ID number.

Then take the `client-voice` endpoint URL and set the voice behavior in your TwiML app that Function URL. 

### Setting up the application

Before trying to generate the site, please copy `.env.example` to `.env` and edit the values to reflect your `capability-token` URL and app location. 


## Installing

After you clone (or download and extract) the repository, you'll need to open a command prompt or terminal window into the root folder of the project.

Install composer dependencies:

    composer install

Install npm repositories:

    yarn
    
For local usage:

    yarn run watch

> You can also run `yarn run dev` and serve the `build_local` folder
    
Deploy for production:

    yarn run production

> This creates the `build_production` folder, which is what you should deploy to your web server. 


# Technologies Used

* [Jigsaw](https://jigsaw.tighten.co)
* [TailwindCSS](https://tailwindcss.com)
* [Font Awesome](https://fontawesome.com)
* [unDraw](https://undraw.co)
* [Netlify](https://www.netlify.com)

## License

Remote Audio is released under the [MIT license](https://opensource.org/licenses/MIT).


