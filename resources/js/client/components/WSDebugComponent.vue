<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        Alert();..55
                    </div>
                    <div>
                        {{ socketValue }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                socketValue: "Default Message!"
            }
        },
        mounted() {
            // alert("Alertawd awd wad awdawd awd 111 22222 33");
            window.console.log('Mounted');
            window.Echo.channel('debug').listen('.TestEvent', (event) => {
                console.log('event', event.message);
                this.socketValue += event.message;
            })
        },
    }
</script>