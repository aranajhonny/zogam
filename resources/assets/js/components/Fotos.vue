<template>
    <div>
        <div v-for="foto in fotos">
            <div id="panel-rev" class="row panel-nuevo ">
            <div class="col-md-12 ">
            <div class="panel panel-info">
                <div class="panel-heading " id="head-rev"></div>
                <div class="panel-body panel-rev">
                    <div class="fotos" v-if="foto.tipo == 'desarmado'">
                       <div class="col-md-4">
                <div class="thumbnail"> 
                  <img v-bind:src="'images/' +  foto.nombre "  style="width:300px">
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