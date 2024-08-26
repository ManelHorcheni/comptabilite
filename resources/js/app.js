require('./bootstrap');

import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('room-status-updated')
    .listen('RoomStatusUpdated', (e) => {
        updateRoomStatus(e.rooms);
    });

function updateRoomStatus(rooms) {
    // Mettre à jour les éléments DOM en fonction des nouvelles données
    rooms.forEach(room => {
        let roomElement = document.querySelector(`#room-${room.id}`);
        if (roomElement) {
            roomElement.querySelector('.availability').textContent = room.available_now ? 'Available' : 'Unavailable';
            roomElement.querySelector('.availability').classList.toggle('text-success', room.available_now);
            roomElement.querySelector('.availability').classList.toggle('text-danger', !room.available_now);
        }
    });
}
