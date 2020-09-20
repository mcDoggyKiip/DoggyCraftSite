<template>
    <div class="col-md-4">
        <div class="card" :class="[online === 'true' ? 'card-green' : 'card-red']" style="min-height: 165px" >
            <div class="card-header">{{name}}</div>
            <div class="card-body">
                Status : {{online === 'true' ? 'Online' : 'Offline'}}<br />
                {{online === 'true' ? 'Playing : '+online_player_count+'/'+max_player_count : ''}}

                <hr/>
                <button type="submit" class="btn btn-app bg-info"><i class="fa fa-info"></i> More Info</button>
                <button type="submit" class="btn btn-app bg-primary" v-if="editable === 'true'"><i class="fa fa-edit"></i> Edit</button>
                <button type="submit" class="btn btn-app bg-danger" v-if="deletable === 'true'"><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'name',
            'online',
            'online_player_count',
            'max_player_count',
            'editable',
            'deletable'
        ]
    }
</script>
