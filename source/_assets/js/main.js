require("@fortawesome/fontawesome-free/js/all");
window.$ = window.jQuery = require('jquery');
const Twilio = require("twilio-client");

window.addEventListener('load', (event) => {

    let capabilityUrl = $('meta[name=twilio_capability_url]').attr("content");

    const device = new Twilio.Device();
    const LoadingMessage = 'One moment please...';
    const ErrorMessage = 'Houston, we have a problem.';
    const ReadyMessage = 'Your phone is ready. Dial away!';
    const RequiredMessage = 'Did you forget something?<br><span class="text-gray-700 text-xs">(Hint: the phone number)</span>';
    const CallingMessage = 'Calling...<i class="fas fa-spinner fa-spin text-purple-500"></i>';
    const ConnectedMessage = 'Connected <i class="fas fa-circle-notch fa-spin text-purple-500"></i>';

    $('#open_options').click(function(e){
      $('#options').show();
    });

    $('#close_options').click(function(e){
        $('#options').hide();
    });

    $('#dial').click(function(e){
        let phoneNumber = $('#phone-number').val();

        if( phoneNumber.length === 0 )
        {
            $('#status').html( RequiredMessage );
            return false;
        }

        var params = {
            To: phoneNumber
        };

        if (device) {
            var outgoingConnection = device.connect(params);
            outgoingConnection.on('ringing', function() {
                $('#dial').hide();
                $('#hangup').show();
                $('#status').html( CallingMessage );
            });
        }
    });

    $('#hangup').click(function(e){
        if (device) {
            $('#dial').show();
            $('#hangup').hide();
            device.disconnectAll();
            $('#status').html(ReadyMessage);
        }
    });

    $('#get-started').click(function(e){

        $('#get-started').html( LoadingMessage );

        $.getJSON( capabilityUrl )
            .then( function ( data ) {
                device.setup( data.token, {
                    fakeLocalDTMF: true,
                    closeProtection: true,
                    enableRingingState: true,
                    codecPreferences: [ 'opus', 'pcmu' ],
                });

                $('#phone').show();
                $('#get-started').hide();

                console.debug( data.identity );

                device.on('ready',function (device) {
                    $('#dial').show();
                    $('#hangup').hide();
                    $('#status').html( ReadyMessage );
                });

                device.on('error', function (error) {
                    console.table(error);
                    $('#status').html( ErrorMessage )
                });

                device.on('connect', function (conn) {
                    $('#dial').hide();
                    $('#hangup').show();
                    $('#status').html( ConnectedMessage );
                });

                device.on('disconnect', function (conn) {
                    $('#dial').show();
                    $('#hangup').hide();
                    $('#status').html(ReadyMessage);
                });

                device.on('mute', function(muted, conn ){
                    //future feature, not needed for simple op audio
                });

                device.on('incoming', function (conn) {
                    conn.reject();
                    console.table(conn);
                });

                device.audio.on('deviceChange', updateAllDevices.bind(device));

                if (device.audio.isOutputSelectionSupported) {
                    $('#open_options').show();
                }
            })
            .catch(function (err) {
                console.table(err);
                setTimeout(() => { $('#get-started').html( ErrorMessage ); }, 1000 );
            });
    });

    $('#get-devices').click(function() {
        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(updateAllDevices.bind(device));
    });

    $('#speaker-devices').change(function() {
        var selectedDevices = [].slice.call( $('#speaker-devices').children() )
            .filter(function(node) { return node.selected; })
            .map(function(node) { return node.getAttribute('data-id'); });

        device.audio.speakerDevices.set(selectedDevices);
    });

    $('#ringtone-devices').change(function() {
        var selectedDevices = [].slice.call( $('#ringtone-devices').children() )
            .filter(function(node) { return node.selected; })
            .map(function(node) { return node.getAttribute('data-id'); });

        device.audio.ringtoneDevices.set(selectedDevices);
    });

    function updateAllDevices() {
        updateDevices( $('#speaker-devices'), device.audio.speakerDevices.get() );
        updateDevices( $('#ringtone-devices'), device.audio.ringtoneDevices.get() );
    }

    function updateDevices(selectEl, selectedDevices) {
        selectEl.empty();

        device.audio.availableOutputDevices.forEach(function(device, id) {
            var isActive = (selectedDevices.size === 0 && id === 'default');
            selectedDevices.forEach(function(device) {
                if (device.deviceId === id) { isActive = true; }
            });

            var option = document.createElement('option');
            option.label = device.label;
            option.setAttribute('data-id', id);
            if (isActive) {
                option.setAttribute('selected', 'selected');
            }
            selectEl.append(option);
        });
    }
});