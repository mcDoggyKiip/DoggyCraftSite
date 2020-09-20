<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        count: {{test}}
                        <div class="btn btn-primary" @click="test+=1"> Add 1 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                test: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
