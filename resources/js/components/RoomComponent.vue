<template>
    <div class="container mt-5">
        <div class="row" v-for="(chunk, index) in chunkedRooms" :key="index">
            <div class="col-md-3" v-for="room in chunk" :key="room.id">
                <div class="card" style="border-radius: 15px">
                    <a :href="'/display/' + room.id" style="text-decoration: none; color: inherit;">
                        <img :src="'/images/' + room.image" class="card-img-top" :alt="room.name_room" style="border-radius: 15px">
                        <div class="card-body">
                            <h5 class="card-title">{{ room.name_room }}</h5>
                            <p class="card-text">
                                Availability: 
                                <span :class="{'text-success': room.available_now, 'text-danger': !room.available_now}">
                                    {{ room.available_now ? 'Available' : 'Unavailable' }}
                                </span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['rooms'],
    data() {
        return {
            updatedRooms: this.rooms
        };
    },
    computed: {
        chunkedRooms() {
            let chunks = [];
            for (let i = 0; i < this.updatedRooms.length; i += 4) {
                chunks.push(this.updatedRooms.slice(i, i + 4));
            }
            return chunks;
        }
    },
    mounted() {
        window.Echo.channel('room-status-updated')
            .listen('RoomStatusUpdated', (e) => {
                this.updatedRooms = e.rooms;
            });
    }
};
</script>

<style scoped>
/* Ajoute tes styles CSS ici */
</style>
