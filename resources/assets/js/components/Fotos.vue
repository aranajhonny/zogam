<template>
    <div>
        <div>
            <div id="panel-rev" class="row panel-nuevo ">
                <div class="col-md-12 ">
                    <div class="fotos" v-for="foto in fotos" v-if="foto.length > 0">
                        <div class="panel panel-info">
                            <div class="panel-heading " id="head-rev"><span>{{ foto[0].tipo.toUpperCase() }}</span></div>
                            <div class="panel-body panel-rev">
                                <div class="fotos" v-for="fot in foto">
                                    <div class="col-md-3">
                                        <div class="thumbnail">
                                            <img v-bind:src="'images/' +  fot.nombre "  style="width:300px" data-action="zoom">
                                              <div style="text-align: center; color:#31708f; padding-top:5px;">
                                                 {{ foto[0].fecha }}
                                              </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['fotos'],
        beforeMount() {
            console.log(this.fotos)
        }
    }
</script>
