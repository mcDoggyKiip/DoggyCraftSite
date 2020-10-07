<template>
    <div class="col-md-4">
        <div class="card" :class ="['card' , status === 'Online' ? 'card-green' : 'card-red']" style="min-height: 165px">
            <div class="card-header">{{name}}</div>
            <div class="card-body">
                <span class="row">Status : {{status}}</span>
                <span class="row" v-if="status === 'Online'">Playing : {{players}}/{{max_players}}</span>
                <hr />
                <div class="row">

                    <form :action="'/gamemode/'+gamemode_id" method="post">
                        <input type="hidden" name="_method" value="GET" />
                        <input type="hidden" name="_token" :value="csrf" />
                        <button type="submit" class="btn btn-app bg-info"><i class="fa fa-info"></i> More Info</button>
                    </form>

                    <form :action="'/gamemode/'+gamemode_id+'/edit'" method="post" v-if="can_edit === true">
                        <input type="hidden" name="_method" value="GET" />
                        <input type="hidden" name="_token" :value="csrf" />
                        <button type="submit" class="btn btn-app bg-primary"><i class="fa fa-edit"></i> Edit</button>
                    </form>

                    <form :action="'/gamemode/'+gamemode_id" method="post" v-if="can_trash === true">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" :value="csrf" />
                        <button type="submit" class="btn btn-app bg-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <div v-if="new Date(added_to_server) >= new Date().setMonth(new Date().getMonth() - 1)" class="ribbon-wrapper ribbon-xl" style="right: 2px; top: -2px; width: 192px; height: 190px;">
            <div class="ribbon bg-warning text-lg" style="right: 3px;">NEW GAME</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            Echo.channel('gamemode-change.' + this.gamemode_id).listen('GamemodeStatusChanged', (data) => {
                this.name = data.gamemode;
                this.status = data.status;
                this.players = data.players;
                this.max_players = data.max_players;
                this.added_to_server = data.added_to_server;
            });
        },
        props: [
            'gamemode_id','name','status','players','max_players','added_to_server','csrf', 'can_edit', 'can_trash'
        ]
    }
</script>
