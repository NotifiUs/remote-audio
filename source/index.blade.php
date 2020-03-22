@extends('_layouts.master')
@section('title', 'Remote Audio')
@push('meta')
    <meta name="twilio_capability_url" content="{{ $page->twilio_capability_url }}">
@endpush
@section('body')

    <a class="float-right mx-2 hidden" title="Open the options sidebar" id="open_options" href="#">
        <i class="fas fa-chevron-circle-left"></i>
    </a>

    <div class="flex">
        <div class=" flex-col bg-black w-full min-h-screen">
            <div class="container mx-auto my-8 mx-4 max-w-xl text-center">

                <!-- Start Content -->
                <div id="phone" class="hidden mt-24">
                    <div class="container mx-auto text-center">
                        <div class="flex items-center mx-auto">
                            <div class="flex-wrap flex-row w-full mx-auto">
                                <input title="Enter the number to dial" type="text" id="phone-number"
                                       class="text-center py-2 px-3 bg-gray-900 text-purple-400 rounded shadow border mx-0 border-r-0 rounded-r-none border-gray-800"><a title="Click to dial the number" href="#" id="dial"
                                   class="text-lg px-3 max-w-xs py-2 bg-purple-800 border border-l-0 border-purple-900 rounded rounded-l-none mx-0 shadow-inner text-purple-500 hover:bg-purple-900 hover:text-purple-300">
                                    <i class="fas fa-phone"></i>
                                </a><a title="Click to hangup the active call" href="#" id="hangup"
                                   class="hidden text-lg px-3 max-w-xs py-2 border border-pink-900 border-l-0 bg-pink-800 rounded rounded-l-none shadow text-pink-500 hover:bg-pink-900 hover:text-pink-300">
                                    <i class="fas fa-phone-slash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="status" class="container mx-auto font-mono my-4 align-text-bottom" style="min-height:10vh;">
                       One moment please...
                    </div>
                    <div id="volume-indicators2" class="mx-auto hidden">

                        <div class="w-1/2 mx-auto">
                            <div class="flex flex-wrap">
                                <div class="flex-col w-1/4">
                                    <a title="Microphone volume (click to mute/unmute)" id="mute" href="#" class="mx-2">
                                        <i class="mute-icon fas fa-microphone text-gray-700"></i>
                                    </a>
                                </div>
                                <div class="flex-col w-3/4 my-auto">
                                    <div id="input-volume" class="h-1 rounded-r shadow"></div>
                                </div>
                            </div>
                            <div class="flex flex-wrap">
                                <div class="flex-col w-1/4">
                                    <i title="Speaker volume" class="fas fa-volume-up text-gray-700"></i>
                                </div>
                                <div class="flex-col w-3/4 my-auto">
                                    <div id="output-volume" class="h-1 rounded-r shadow"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="flex flex-row mx-auto text-center">
                    <a id="get-started" title="Click to load phone" href="#" class="font-mono text-lg hover:text-purple-500 inline-flex my-24 mx-auto text-center">
                        Ready to start?
                    </a>
                </div>

                <div class="flex flex-wrap mx-auto text-center">
                    <small class="flex-row mx-auto text-xs text-gray-700 font-semibold font-mono">
                        Made by
                    </small>
                </div>
                <div class="flex flex-row mx-auto text-center bottom-0">

                    <a title="Level up your call center" href="https://github.com/NotifiUs/remote-audio"
                       class="mx-auto text-center">
                        <img title="Level up your call center" src="/assets/images/notifius-light-logo.png"
                             class="mx-auto w-32 mt-0">
                    </a>
                </div>
                <small class="text-xs text-purple-700 font-mono">
                    Powered by <a class="font-semibold text-purple-600 hover:text-purple-500"
                                  title="Visit Twilio's website" href="https://twilio.com">Twilio</a>
                </small>

                <!-- End Content -->
            </div>
        </div>
        <div id="options" class="z-10 max-w-md absolute right-0 h-screen bg-gray-900 border-l-2 border-purple-700 shadow-inner w-2/5 hidden">

            <div class="px-2 container mx-auto my-2 py-2">
                <a class="float-left" title="Close the options sidebar" id="close_options" href="#">
                    <i class="fas fa-chevron-circle-right"></i>
                </a>
            </div>

            <div class="px-2 container mx-auto my-2 py-2">
                <label class="text-gray-700 inline-flex my-2 font-semibold">Ringtone Devices</label>
                <select id="ringtone-devices" multiple
                        class="text-xs overflow-y-hidden py-2 px-3 bg-gray-900 text-purple-400 rounded shadow border border-gray-800 w-full overflow-x-hidden"></select>
            </div>
            <div class="px-2 container mx-auto my-2 py-2">
                <label class="text-gray-700 inline-flex my-2 font-semibold">Speaker Devices</label>
                <select id="speaker-devices" multiple
                    class="text-xs overflow-y-hidden py-2 px-3 bg-gray-900 text-purple-400 rounded shadow border border-gray-800 w-full overflow-x-hidden"></select>
            </div>
            <div class="px-2 container mx-auto my-2 py-2">
                <a href="#" id="get-devices"
                   class="text-sm text-center max-w-xs text-purple-700 hover:text-purple-500">
                    Devices not showing?
                </a>
            </div>

        </div>
    </div>





@endsection
