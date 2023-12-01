<template>

    <!--cartas del admin-->
    <section class="carreras-lista">
        <div class="centrar title">
            <h4>Carreras</h4>
        </div>
        <div class="cards-container" v-if="carrerasLoaded">
            <card-pv v-for="carreraCard in carrerasLoaded" :key="carreraCard.id" class="card"> <!--v-for="datosCard in filteredBanner"-->
                <template #header>
                    <!--<img :src="carreraCard.img" alt="Card Image" class="imagen-resolucion" />--> <!--'/storage/' + carreraCard.img-->
                    <img :src="carreraCard.url_imagen" alt="Card Image" class="imagen-resolucion" />
                </template>
                <template #title> {{carreraCard.nombre_carrera}} </template>
                <template #subtitle>
                    <div class="container-palette-color row-div">
                        <div class="color-primary item" :style="{backgroundColor: '#'+carreraCard.colores.colorPrimario }"></div>
                        <div class="color-secundary item" :style="{backgroundColor: '#'+carreraCard.colores.colorSecundario }"></div>
                        <div class="color-ternary item" :style="{backgroundColor: '#'+carreraCard.colores.colorTerciario }"></div>
                    </div>
                </template>
                <template #footer>

                    <div class="controls-operations-carrera ">
                        <button-pv icon="pi pi-pencil" class="p-button p-button-warning" 
                        @click="editarCarrera(carreraCard.id,carreraCard.nombre_carrera)"/>
                        <button-pv icon="pi pi-trash" class="p-button p-button-danger" 
                        @click="eliminarCarrera(carreraCard.id,carreraCard.nombre_carrera)" />
                    </div>
                </template>
                <template #empty>
                    <div class="flex justify-center align-middle text-xl">
                        <h2>No se encontraron datos</h2>
                    </div>
                </template>
            </card-pv>
        </div>
        <div v-else><!--por si no hay ningun registro en la base de datos-->
            <h4><span>NO HAY CARRERAS REGISTRADAS AUN</span></h4>
        </div>

        <!--dialogo para mostrar los datos de la carrera a eliminar-->
        <dialog-pv v-model:visible="visibleDialogDelete" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
        :style="{ width: '70vw' }" header="Ver datos relacionados" modal class="p-fluid" maximizable >
            <div class="field">
                <form @submit.prevent="">
                    <div class="container-datos-relacionados-eliminar">
                        <div class="titulo-nombre-carrera centrar">
                            <h3>{{ carreraEliminar.datos.nombre_carrera }}</h3>
                        </div>

                        <div class="container-imagen-carrera-eliminar centrar">
                                <img :src="carreraEliminar.datos.objetivos_carrera.url_imagen" alt="Imagen de la carrera" 
                                class="imagen-resolucion estilo-imagen" />
                        </div>

                        <div class="container-palette-colors centrar">
                            <div class="row-div">
                                <div class="color-primary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorPrimario }"></div>
                                <div class="color-secundary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorSecundario }"></div>
                                <div class="color-ternary item" :style="{backgroundColor: '#'+carreraEliminar.datos.colores.colorTerciario }"></div>
                            </div>
                        </div>

                        <hr>
                        <div class="container-objetivos-carrera">
                            <div class="titulo-apartado centrar">
                                    <h5>Objetivos de la carrera</h5>
                            </div>

                            <div class="container-objetivos-plan-estudios">
                                <!--objetivos de la carrera-->
                                <div class="objetivos-plan-estudios">
                                    <span><strong>Objetivos plan de estudios</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.plan_estudios}}</p>
                                </div>
                            </div>

                            <!--vision de la carrera-->
                            <div class="container-vision-carrera">
                                <!--objetivos de la carrera-->
                                <div class="vision-eliminar">
                                    <span><strong>Vision</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.vision}}</p>
                                </div>
                            </div>

                            <!--mision de la carrera-->
                            <div class="container-mision-carrera">
                                <!--objetivos de la carrera-->
                                <div class="mision-eliminar">
                                    <span><strong>Mision</strong></span>
                                    <p>{{carreraEliminar.datos.objetivos_carrera.mision}}</p>
                                </div>
                            </div>

                        </div>

                        <!--perfil de ingreso de la carrera-->
                        <hr>
                        <div class="container-perfil-ingreso">
                            <div class="titulo-apartado centrar">
                                <h5>Perfil ingreso</h5>
                            </div>

                            <div class="container-conocimientos">
                                <span><strong>Conocimientos</strong></span>
                                <ul class="lista-conocimientos">
                                    <li v-for="(conocimiento_carrera,index) in carreraEliminar.datos.perfil_ingreso.conocimientos"
                                    :key="conocimiento_carrera.nombre+'_'+index" class="item-conocimiento">
                                        {{ conocimiento_carrera.nombre  }}
                                    </li>
                                </ul>
                                
                            </div>

                            <div class="container-habilidades">
                                <span><strong>Habilidades</strong></span>
                                <ul class="lista-habilidades">
                                    <li v-for="(habilidad_carrera,index) in carreraEliminar.datos.perfil_ingreso.habilidades"
                                    :key="habilidad_carrera+'_'+index" class="item-habilidad">
                                        {{ habilidad_carrera.nombre  }}
                                    </li>
                                </ul>
                            </div>

                            <div class="container-actitudes">
                                <span><strong>Actitudes</strong></span>
                                <ul class="lista-actitudes">
                                    <li v-for="(actitud_carrera,index) in carreraEliminar.datos.perfil_ingreso.actitudes"
                                    :key="actitud_carrera+'_'+index" class="item-actitud">
                                        {{ actitud_carrera.nombre  }}
                                    </li>
                                </ul>
                            </div>

                            <div class="video-carrera">
                                <span><strong>Video</strong></span>
                                <div class="video-direccion">
                                    <a :href="carreraEliminar.datos.perfil_ingreso.video" target="_blank">{{ carreraEliminar.datos.perfil_ingreso.video }}</a>
                                </div>
                               
                            </div>
                        </div>

                        <hr>
                        <!--perfil de egreso de la carrera-->
                        <div class="container-perfil-egreso">
                            <div class="perfil-egreso-delete">
                                <span class="centrar"><strong>Perfil egreso</strong></span>
                                <p>{{ carreraEliminar.datos.perfil_egreso }}</p>
                            </div>
                        </div>

                        <!--ciclos de formacion de la carrera-->
                        <hr>

                        <div class="container-ciclos-formacion">
                            <span class="centrar"><strong>Ciclos de formación</strong></span>
                            <div class="ciclos-formacion-delete">
                                <div v-for="(ciclo_formacion,index) in carreraEliminar.datos.ciclos_formacion" :key="index">
                                    <span><strong>{{ ciclo_formacion.numero_ciclo }}</strong></span>
                                    <p>{{ ciclo_formacion.descripcion }}</p>
                                </div>
                                
                            </div>
                        </div>

                        <!--plan de estudios y folleto digital-->
                        <hr>
                        <div class="container-plan-estudios-folleto-digital">
                            <div class="titulo-apartado centrar">
                                    <strong>Documentos</strong>
                            </div>
                            <div class="plan-estudios-delete">
                                <span><strong>{{carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.titulo}}</strong></span>
                                <br>
                                <span>
                                    Direccion del documento:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.url_documento }}
                                </span>
                                <br>
                                <span>
                                    Direccion del fondo:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo }}
                                </span>
                            </div>
                            <div class="folleto-digital-delete">
                                <span><strong>{{carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.titulo}}</strong></span>
                                <br>
                                <span>
                                    Direccion del documento:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.url_documento }}
                                </span>
                                <br>
                                <span>
                                    Direccion del fondo:
                                    {{ carreraEliminar.datos.plan_estudios_folleto_digital.folleto_digital.url_imagen_fondo }}
                                </span>
                            </div>
                        </div>

                        <!--pagina principal-->
                        <hr>
                        <div class="container-pagina-principal">
                            <div class="imagen-p">
                                <span><strong>Imagen principal</strong></span>
                                <br>
                                <mark>{{carreraEliminar.datos.pagina_principal.url_imagen}}</mark>
                            </div>

                            <br>
                            <div class="container-iconos-informativos">
                                <span><strong>Iconos informativos</strong></span>
                                <ul class="lista-iconos-informativos">
                                    <li v-for="(icono,index) in carreraEliminar.datos.pagina_principal.tarjetas_informativas_pp"
                                    :key="icono.descripcion+'_'+index">
                                        <details class="item-icono-informativo">
                                            <summary class="titulo-icono-informativo">{{icono.descripcion}}</summary>
                                            <div class="direccion-icono-informativo">
                                                <a href="#" target="_blank"> {{icono.url_direccion_imagen}}</a>
                                               
                                            </div>
                                        </details>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!--boton para confirmar la eliminacion de la carrera-->
                    <br>
                    <div class="controls-delete-carrera centrar">
                        <button-pv label="Eliminar" icon="pi pi-trash" type="button" @click="confirmaEliminacion()"
                        :style="{ width: '25%' }"/>
                    </div>
                </form>
            </div>
        </dialog-pv>


        <!--dialogo para mostrar los datos de la carrera a modificar-->
        <dialog-pv v-model:visible="visibleDialogEdit" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
        :style="{ width: '70vw' }" header="Ver datos relacionados" modal class="p-fluid" maximizable >
                <div class="field">
                    <form @submit.prevent="">
                        <div class="editar-identidad-carrera">
                            <div class="nombre-carrera-editar">
                                <b>Nombre de la carrera:</b>    
                                <input-text-pv  class="" v-model="carreraEditar.datos.nombre_carrera"/>
                            </div>

                            <div class="container-imagen-carrera-editar centrar">
                                <img :src="carreraEditar.datos.objetivos_carrera.url_imagen" alt="Imagen de la carrera" 
                                class="imagen-resolucion estilo-imagen" />
                            </div>

                            <br>
                            <div class="container-palete-colors">
                                <div class="title-section">
                                    <b>Paleta de colores</b>
                                </div>

                                <div class="show-color-palete centrar">
                                    <!--Apartado para mostrar los colores que se estan seleccionando-->
                                    <div class="card flex gap-1 show-palete-color margin-bottom-custom centrar">
                                        <div class="item" id="palete-pc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorPrimario}"></div> 
                                        <div class="item" id="palete-sc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorSecundario}"></div>
                                        <div class="item" id="palete-tc" :style="{backgroundColor:'#'+carreraEditar.datos.colores.colorTerciario}"></div>
                                    </div>
                                </div>
                                <!--entradas para seleccionar la paleta de colores-->
                                <div class="centrar">
                                    <div class="controls-color-picker" style="width: 40%;">
                                        <color-picker-pv class="color-primary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorPrimario"></color-picker-pv >
                                        <color-picker-pv class="color-secundary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorSecundario"></color-picker-pv>
                                        <color-picker-pv class="color-ternary" 
                                        style='width: 33%;' v-model="carreraEditar.datos.colores.colorTerciario"></color-picker-pv>
                                    </div>
                                </div>

                            </div>

                            <!--apartado para los objetivos de la carrera-->
                            <hr>
                            <div class="objetivos-carrera-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Objetivos de la carrera</strong></h5>
                                </div>
                                <div class="objetivos-plan-estudios">
                                    <h6>Objetivos plan de estudios</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Objetivos del plan de estudios" 
                                    class="long-text-area"   v-model="carreraEditar.datos.objetivos_carrera.plan_estudios"/>
                                </div>

                                <div class="mision-carrera-editar">
                                    <h6>Misión</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Misión de la carrera" 
                                    class="long-text-area"   v-model="carreraEditar.datos.objetivos_carrera.mision"/>
                                </div>

                                <div class="vision-carrera-editar">
                                    <h6>Visión</h6>
                                    <text-area-pv rows="5"  autoResize  placeholder="Visión de la carrera" 
                                    class="long-text-area"  v-model="carreraEditar.datos.objetivos_carrera.vision"/>
                                </div>

                                <div class="imagen-carrera-editar">
                                    <h6>Dirección imagen de la carrera</h6>
                                    <input-text-pv type="text" placeholder="https://ingenieria_autotriz_escudo_imagen" 
                                    v-model="carreraEditar.datos.objetivos_carrera.url_imagen" class=""/>
                                </div>
                            </div>

                            <!--apartado para el perfil de ingreso-->
                            <hr>
                            <div class="perfil-ingreso">
                                <div class="title-section centrar">
                                    <h5><strong>Pefil ingreso</strong></h5>
                                </div>


                                <div class="conocimientos-carrera-editar">
                                    <h6>Conocimientos</h6>
                                    <!--<p>{{ carreraEditar.datos.perfil_ingreso.conocimientos }}</p>-->
                                    <div class="agregar-conocimientos-carrera-editar ">
                                        <div class="entrada-conocimiento-carrera-editar">
                                            <span> Nombre del conocimiento:</span>
                                            <input-text-pv placeholder="ejem. Física" class="medium-input-lenght"/>&nbsp
                                        </div>

                                        <div class="btn-agregar-conocimiento-carrera-editar " >
                                                <button-pv label="Agregar conocimiento" type="button" severity="secondary"  
                                                  @click=""/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="selector-conocimientos-carrera-editar">
                                        <span>Seleccionar conocimientos:</span>
                                        <multi-select-pv v-model="carreraEditar.datos.perfil_ingreso.conocimientos" 
                                        :options="conocimientosCarrera" filter optionLabel="nombre" 
                                        placeholder="Selecciona conocimientos"
                                        :maxSelectedLabels="3" class="w-full md:w-20rem" />
                                    </div>

                                    <div class="container-conocimientos-seleccionados-carrera-editar">
                                        <!--mostrar los conocimientos que se ha agregado-->
                                        <strong>conocimientos seleccionados</strong>
                                        <ul>
                                            <li v-for="(conocimiento,index) in carreraEditar.datos.perfil_ingreso.conocimientos" 
                                            :key="index">{{ conocimiento.nombre }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="habilidades-carrera-editar">
                                    <h6>Habilidades</h6>
                                    <!--<p>{{ carreraEditar.datos.perfil_ingreso.habilidades }}</p>-->
                                    
                                    <div class="agregar-habilidades-carrera-editar ">
                                        <div class="entrada-habilidad-carrera-editar">
                                            <span> Nombre de la habilidad:</span>
                                            <input-text-pv placeholder="ejem. Creatividad" class="medium-input-lenght"/>&nbsp
                                        </div>

                                        <div class="btn-agregar-habilidad-carrera-editar " >
                                                <button-pv label="Agregar habilidad" type="button" severity="secondary"  
                                                  @click=""/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="selector-habilidades-carrera-editar">
                                        <span>Seleccionar habilidades:</span>
                                        <multi-select-pv v-model="carreraEditar.datos.perfil_ingreso.habilidades" 
                                        :options="habilidadesCarrera" filter optionLabel="nombre" 
                                        placeholder="Selecciona habilidades"
                                        :maxSelectedLabels="3" class="w-full md:w-20rem" />
                                    </div>

                                    <div class="container-habilidades-seleccionadas-carrera-editar">
                                        <!--mostrar los conocimientos que se ha agregado-->
                                        <strong>habilidades seleccionadas</strong>
                                        <ul>
                                            <li v-for="(habilidad,index) in carreraEditar.datos.perfil_ingreso.habilidades" 
                                            :key="index">{{ habilidad.nombre }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="actitudes-carrera-editar">
                                    <h6>Actitudes</h6>
                                    <!--<p>{{ carreraEditar.datos.perfil_ingreso.actitudes }}</p>-->
                                    <div class="agregar-actitudes-carrera-editar ">
                                        <div class="entrada-actitud-carrera-editar">
                                            <span> Nombre de la actitud:</span>
                                            <input-text-pv placeholder="ejem. Compromiso" class="medium-input-lenght"/>&nbsp
                                        </div>

                                        <div class="btn-agregar-actitud-carrera-editar " >
                                                <button-pv label="Agregar actitud" type="button" severity="secondary"  
                                                  @click=""/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="selector-actitudes-carrera-editar">
                                        <span>Seleccionar actitudes:</span>
                                        <multi-select-pv v-model="carreraEditar.datos.perfil_ingreso.actitudes" 
                                        :options="actitudesCarrera" filter optionLabel="nombre" 
                                        placeholder="Selecciona actitudes"
                                        :maxSelectedLabels="3" class="w-full md:w-20rem" />
                                    </div>

                                    <div class="container-actitudes-seleccionadas-carrera-editar">
                                        <!--mostrar los conocimientos que se ha agregado-->
                                        <strong>actitudes seleccionadas</strong>
                                        <ul>
                                            <li v-for="(actitud,index) in carreraEditar.datos.perfil_ingreso.actitudes" 
                                            :key="index">{{ actitud.nombre }}</li>
                                        </ul>
                                    </div>
                                    
                                </div>

                                <div class="video-carrera-editar">
                                    <h6>Video</h6>
                                    <input-text-pv v-model="carreraEditar.datos.perfil_ingreso.video" 
                                    placeholder="https://www.youtube.com/watch?v=o7oJGLzxikw&ab_channel=CanalOficialUPQ"  class=""/>
                                </div>

                            </div>

                            <!--apartado para el perfil de egreso-->
                            <hr>
                            <div class="perfil-egreso-carrera-e">
                                <div class="title-section centrar">
                                    <h5><strong>Pefil egreso</strong></h5>
                                </div>
                                <text-area-pv rows="5"  autoResize placeholder="Descripción del perfil de egreso" v-model="carreraEditar.datos.perfil_egreso"/>
                            </div>

                            <!--apartado para los documentos follada digital y plan estudios-->
                            <hr>
                            <div class="plan-estudios-folleto-digital-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Documentos</strong></h5>
                                </div>
                                
                                <div class="plan-estudios-carrera-editar">
                                    <h6>Titulo:</h6>
                                    <input-text-pv placeholder="Plan de estudios" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.titulo"/>
                                    
                                    <h6>Url documento:</h6>
                                    <input-text-pv placeholder="https://plan-estudios-carrera" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.url_documento"/>
                                    
                                    <h6>Url imagen de fondo:</h6>
                                    <input-text-pv placeholder="https://my_background_image" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.plan_estudios.url_imagen_fondo"/>
                                </div>
                                <br>
                                <div class="folleto-digital-carrera-editar">
                                    <h6>Titulo:</h6>
                                    <input-text-pv placeholder="Folleto digital" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.folleto_digital.titulo"/>
                                    
                                    <h6>Url documento:</h6>
                                    <input-text-pv placeholder="https://folleto-digital" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.folleto_digital.url_documento"/>
                                    
                                    <h6>Url imagen de fondo:</h6>
                                    <input-text-pv placeholder="https://my_background_image" 
                                        v-model="carreraEditar.datos.plan_estudios_folleto_digital.folleto_digital.url_imagen_fondo"/>
                                </div>

                            </div>

                            <!--apartado para los ciclos de formacion-->
                            <hr>
                            <div class="ciclos-formacion-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Ciclos de formación</strong></h5>
                                </div>

                                <div class="container-ciclos-formacion-carrera-editar">
                                    <div class="entradas-carrera-ciclos-formacion-editar">
                                        <input-number-pv placeholder="Numero ciclo" style="width: 30%;" v-model="cicloFormacionAgregar.numero_ciclo"/>
                                        <input-text-pv type="text"  
                                        placeholder="Descripción" style="width: 70%;" v-model="cicloFormacionAgregar.descripcion"/>
                                    </div>
                                    <div class="controls-carrera-ciclos-formacion-editar centrar" style="padding: 1%;">
                                        <button-pv label="Agregar" type="button" severity="secondary" 
                                        @click="addCicloFormacion()" style="width: 25%;"/>
                                    </div>
                                </div>

                                <div class="container-ciclos-formacion-agregados-editar">
                                    <!--<p>{{ carreraEditar.datos.ciclos_formacion }}</p>-->

                                    <div> <!--class="card"-->
                                        <table-pv :value="carreraEditar.datos.ciclos_formacion" 
                                        showGridlines tableStyle="min-width: 50rem" selectionMode="single" dataKey="descripcion" :metaKeySelection="false"
                                        @rowSelect="onCicloSelect" @rowUnselect="onCicloUnselect"  v-model:selection="cicloEditarSelected">

                                            <column-pv field="numero_ciclo" header="Número de ciclo" style="width: 20%;"></column-pv>
                                            <column-pv field="descripcion" header="Descripción"></column-pv>
                                        </table-pv>
                                    </div>

                                </div>

                            </div>

                            <!--apartado para la pagina principal con sus iconos informativos-->
                            <hr>
                            <div class="iconos-informativos-editar">
                                <div class="title-section centrar">
                                    <h5><strong>Página principal</strong></h5>
                                </div>  

                                <div class="imagen-pp-carrera-editar">
                                    <h6>Imagen de la pagina principal:</h6>
                                    <input-text-pv placeholder="https://my_background_main_screen_carrer" 
                                        v-model="carreraEditar.datos.pagina_principal.url_imagen"/>

                                </div>
                                <br>
                                <div class="iconos-informativos-carrera-editar">
                                    <h6>Iconos informativos</h6>
                                    <!--<p>{{ carreraEditar.datos.pagina_principal.tarjetas_informativas_pp }}</p>-->
                                    <div class="agregar-icono-informativo-carrera-editar flex flex-column gap-3">
                                            <div class="entrada-descripcion-carrera-editar ">
                                                <span>Descripción:</span>
                                                <input-text-pv placeholder="ejem. Titulación automatica" 
                                                    v-model="iconoInformativoAgregar.descripcion"/>
                                            </div>

                                            <div class="entrada-direccion-imagen-carrera-editar">
                                                <span>Dirección imagen:</span>
                                                <input-text-pv placeholder="https://cdn-icons-png.flaticon.com/512/686/686051.png" 
                                                    v-model="iconoInformativoAgregar.url_direccion_imagen"/>
                                            </div>

                                            <div class="button-add-icono-informativo centrar">
                                                <button-pv label="Agregar" type="button" severity="secondary"
                                                style="width: 25%;" @click="addIconoInformativo()"></button-pv>
                                            </div>
                                    </div>
                                    <br>
                                    <div class="iconos-informativos-agregados">
                                        <table-pv :value="carreraEditar.datos.pagina_principal.tarjetas_informativas_pp" 
                                        showGridlines tableStyle="min-width: 50rem"
                                        selectionMode="single" dataKey="url_direccion_imagen" :metaKeySelection="false"
                                        @rowSelect="onIconInfoSelect" @rowUnselect="onIconInfoUnselect"  v-model:selection="iconEditarSelected">

                                            <column-pv field="descripcion" header="Descripción"></column-pv>
                                            <column-pv field="url_direccion_imagen" header="Dirección icono"></column-pv>
                                        </table-pv>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!--boton para confirmar la edicion de la carrera-->
                        <br>
                        <div class="controls-edit-carrera centrar">
                            <button-pv label="Guardar cambios" icon="pi pi-save" type="button" @click="confirmaEidicion()"
                            :style="{ width: '25%' }"/>
                        </div>
                    </form>
                </div>    
        </dialog-pv>

        <!--dialogo para confirmar la eliminacion de la carrera-->
        <dialog-pv v-model:visible="visibleDialogConfirmDelete" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
        :style="{ width: '70vw' }" header="Aviso!" modal class="p-fluid">
            <div class="alert-message centrar">
                <h4>¿Seguro que desea eliminar esta carrera?</h4>
            </div>
            <div class="controls-dialog-confirm-delete row-div  distribucion-uniforme">
                <button-pv label="Confirmar"  severity="success" raised icon="pi pi-check" 
                class="btn-dialog-actions" @click="ejecutaEliminacion()"/>

                <button-pv label="Cancelar" severity="danger" raised icon="pi pi-times" 
                class="btn-dialog-actions" @click="visibleDialogConfirmDelete = false"/>
            </div>
        </dialog-pv>

        <!--dialogo para confirmar la edicion de la carrera-->
        <dialog-pv v-model:visible="visibleDialogConfirEdit" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
            :style="{ width: '70vw' }" header="Aviso!" modal class="p-fluid">
            <div class="alert-message centrar">
                <h5>¿Seguro que desea realizar estos cambios en la información de la carrera?</h5>
            </div>
            <div class="controls-dialog-confirm-delete row-div  distribucion-uniforme">
                <button-pv label="Confirmar" severity="success" raised icon="pi pi-check" 
                class="btn-dialog-actions" @click="ejecutaEdicion()"/>

                <button-pv label="Cancelar" severity="danger" raised icon="pi pi-times" 
                class="btn-dialog-actions" @click="visibleDialogConfirEdit=false"/>
            </div>
        </dialog-pv>

        <!--dialogo para editar un ciclo de formacion de la carrera-->
        <dialog-pv v-model:visible="visibleDialogEditCicloFormacion" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
            :style="{ width: '70vw' }" header="Edición" modal class="p-fluid" >
            <div class="controls-dialog-edit-ciclo-formacion">
                <input-number-pv placeholder="Numero ciclo" style="width: 30%;"
                v-model="cicloEditarSelected.numero_ciclo"/>
                <input-text-pv type="text"  
                placeholder="Descripción" style="width: 70%;" v-model="cicloEditarSelected.descripcion"/>
                
                <div class="btn-delete-ciclo-edit " style="padding-top: 1%;">
                    <button-pv type="button" label="Eliminar" severity="danger" icon="pi pi-trash" 
                    @click="deleteCicloEdit()"></button-pv>
                </div>

            </div>
        </dialog-pv>

        <!--dialogo para editar un icono informativo de la carrera(pagina principal)-->
        <dialog-pv v-model:visible="visibleDialogEditIconInfo" :breakpoits="{ '960px': '75vw', '640px': '85vw' }" 
            :style="{ width: '70vw' }" header="Edición" modal class="p-fluid">
            <div class="controls-dialog-edit-icono-informativo">
                <input-text-pv placeholder="Descripcion" style="width: 30%;"
                v-model="iconEditarSelected.descripcion"/>
                <input-text-pv type="text" placeholder="ejem. https://iconos8.es/icon/IjiO3OXCb817/peligro-de-electricidad" 
                style="width: 70%;" v-model="iconEditarSelected.url_direccion_imagen"/>

                <div class="btn-delete-icon-edit " style="padding-top: 1%;">
                    <button-pv type="button" label="Eliminar" severity="danger" icon="pi pi-trash" 
                    @click="deleteIconEdit()"></button-pv>
                </div>

            </div>
        </dialog-pv>

        <!--dialogo para mostrar un mensaje-->
        <dialog-pv v-model:visible="visibleDialogMessage" :style="{ width: '50vw' }" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }"
         header="Aviso!" modal class="p-fluid" >
            <message class="content-message centrar" :closable="false" :severity="messageDialog.severityActual"
            style="width: 100%;">
                <h2>{{ messageDialog.message }}</h2>
            </message>
            <button-pv label="Aceptar" @click="visibleDialogMessage = false"></button-pv>
        </dialog-pv>


        <!--dialogo para mostrar un progress spinner-->
        <dialog-pv v-model:visible="visibleSpinnerDialog" :style="{ width: '50vw' }" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }"
         header="Cargando..." modal class="p-fluid" :closable="false">
         <div class="container-spinner centrar" style="margin:2%">
            <progress-spinner />
         </div>
        </dialog-pv>

    </section>

</template>

<script>
import { defineComponent } from 'vue';
import { ref } from 'vue';
//compnentes de primevue
import Card from 'primevue/card';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Textarea from 'primevue/textarea';
import Colorpicker from 'primevue/colorpicker';
import MultiSelect from 'primevue/multiselect';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Message from 'primevue/message';
import ProgressSpinner from 'primevue/progressspinner';


import axios from 'axios';


export default defineComponent({
  name:'carrera-lista',
  components: {
    'card-pv':Card,
    'button-pv':Button,
    'dialog-pv':Dialog,
    'input-text-pv':InputText,
    'input-number-pv':InputNumber,
    'text-area-pv':Textarea,
    'color-picker-pv':Colorpicker,
    'multi-select-pv':MultiSelect,
    'table-pv':DataTable,
    'column-pv':Column,
    'message':Message,
    'progress-spinner':ProgressSpinner,

  },
  props: {
    title:{
      type:String,
      default:'Lista de carreras'
    },
    url_getCarreras:{
      type:String,
      required:true,
    },
    url_getCarreraUnica:{
        type:String,
        required:true,
    },
    url_deleteCarrera:{
        type:String,
        required:true,
    },
    url_editCarrera:{
        type:String,
        required:true,
    },   
    url_carreraConocimientos:{
      type:String,
      required:true,
    },
    url_carreraHabilidades:{
      type:String,
      required:true,
    },
    url_carreraActitudes:{
      type:String,
      required:true,
    },
  },
  // Setup del componente (opcional)
  setup(props) {

    //variables
    const visibleDialogDelete = ref(false); //dialogo de alerta para eliminar una carrera
    const visibleDialogEdit = ref(false); //dialogo de alerta para editar una carrera
    const visibleDialogConfirmDelete = ref(false); //dialogo de alerta para editar una carrera
    const visibleDialogConfirEdit = ref(false); //dialogo de alerta para editar una carrera

    const visibleDialogEditCicloFormacion = ref(false); //dialogo de alerta para editar un ciclo de formacion
    const visibleDialogEditIconInfo = ref(false); //dialogo de alerta para editar un icono informativo

    const visibleDialogMessage = ref(false);
    const visibleSpinnerDialog = ref(false); //para el spinner de carga

    //variables para validar si se confirmo la eliminacion o edicion de una carrera
    const confirmEliminacionCarrera = ref(false);
    const confirmEdicionCarrera = ref(false);

    const carrerasLoaded = ref([]);//guardara las carreras que se traigan de la base de datos
    const isLoading = ref(true);//para saber si se esta cargando la informacion de la base de datos

    const carreraEliminar = ref();//guardara los datos de la carrera que se desea eliminar
    const carreraEditar = ref();//guardara los datos de la carrera que se desea editar

    //para modificar los ciclos e iconos informativos de la pagina principal
    const cicloEditarSelected = ref();//guardara el ciclo seleccionado para editar
    const iconEditarSelected = ref();//guarda el icono informativo que se desea editar

    //para guardar los indices de los ciclos e iconos informativos modificandose
    let indexDataEditing = 0;

    //para guardar los conocimientos, habilidades y actitudes disponibles

    const conocimientosCarrera = ref([]);//guardara los conocimientos disponibles
    const habilidadesCarrera = ref([]);//guardara las habilidades disponibles
    const actitudesCarrera = ref([]);//guardara las actitudes disponibles

    const messageDialog = ref({
        message:'This message dialog',
        severityValues:['success',"error","warn","info"],
        severityActual: 'success'
    });

    //para guardar la entrada de un ciclo de formacion que se quiera agregar
    const cicloFormacionAgregar = ref({
        numero_ciclo:1,
        descripcion:'',
    });

    const iconoInformativoAgregar = ref({
        descripcion:'',
        url_direccion_imagen:'',
    });
    
    //functions
    function getCarreras(){
        //trae todas las carreras guardadas de la base de datos
        visibleSpinnerDialog.value = true;

        axios.post(props.url_getCarreras)
        .then(function(response){
            const carreras = response.data;
            carrerasLoaded.value = [];

            carreras.forEach(element => {
                carrerasLoaded.value.push(element);
            });

            visibleSpinnerDialog.value = false;

        }).catch(function(error){
            setAlertMessage(error,1);
            visibleDialogMessage.value = true;
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
        });
    }

    //para mostrar la informacion de la carrera a eliminar
    function eliminarCarrera(id,carrera_nombre){
        visibleSpinnerDialog.value = true;
        
        //solicitamos la informacion de la carrera a eliminar
        axios.post(props.url_getCarreraUnica,{'id':id})
        .then(function(response){
            const carreraDatos = response.data;
    
            carreraEliminar.value = carreraDatos;
            visibleSpinnerDialog.value = false;
            visibleDialogDelete.value = true;
        }).catch(function(error){
            setAlertMessage(error,1);
            visibleSpinnerDialog.value = false;
            visibleDialogMessage.value = true;
            console.error(error);
        });

    }

    function confirmaEliminacion(){
        visibleDialogConfirmDelete.value = true;
    }

    function ejecutaEliminacion(){
        
        if(carreraEliminar.value == null || carreraEliminar.value == undefined 
        || carreraEliminar.value == ''){
            return;
        }

        visibleSpinnerDialog.value = true;

        axios.post(props.url_deleteCarrera,{'id':carreraEliminar.value.id})
        .then(function(response){
            setAlertMessage(response.data,0);
            visibleDialogConfirmDelete.value = false;
            visibleDialogDelete.value = false;
            visibleDialogMessage.value = true;

        }).catch(function(error){
            setAlertMessage(error,1);
            visibleDialogMessage.value = true;
            console.error(error);

        }).finally(function(){
            isLoading.value = false;
            visibleSpinnerDialog.value = false;
            confirmEliminacionCarrera.value = false;

            getCarreras();
        });
    }

    function confirmaEidicion(){
        visibleDialogConfirEdit.value = true;
    }

    function editarCarrera(id,carrera_nombre){
        visibleSpinnerDialog.value = true;

        //solicitamos la informacion de la carrera a actualizar
        axios.post(props.url_getCarreraUnica,{'id':id})
        .then(function(response){
            const carreraDatos = response.data;
            //guardamos la informacion de la carrera a editar
            carreraEditar.value = carreraDatos;
            visibleDialogEdit.value = true;

        }).catch(function(error){
            setAlertMessage(error,1);
            visibleDialogMessage.value = true;
            console.error(error);
        }).finally(function(){
            isLoading.value = false;
            visibleSpinnerDialog.value = false;
        });
    }

    function ejecutaEdicion(){
        //mandamos la informacion a la ruta para poder actualizar la informacion de la carrera 
        if(carreraEditar.value == null || carreraEditar.value == undefined 
        || carreraEditar.value == ''){
            return;
        }         
        //creamos un objeto de tipo FormData para enviar la informacion de la carrera
        const formData = new FormData();
        formData.append('id',carreraEditar.value.id);
        formData.append('datos',JSON.stringify(carreraEditar.value.datos));

        visibleSpinnerDialog.value = true; //mostramos el spinner de carga

        //enviamos la informacion con el id de la carrera para editarla
        axios.post(props.url_editCarrera,formData,{
            headers:{
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response){
            visibleDialogConfirEdit.value = false;
            setAlertMessage(response.data,0);
            visibleDialogMessage.value = true;

        }).catch(function(error){
            setAlertMessage(error,1);
            visibleDialogMessage.value = true;
            console.error(error);

        }).finally(function(){
            isLoading.value = false;
            visibleSpinnerDialog.value = false;
            confirmEdicionCarrera.value = false;
            getCarreras();
        });

    }

    //para configurar la informacion del mensaje de alerta
    function setAlertMessage(message,severity){
        messageDialog.value.message = message;
        messageDialog.value.severityActual = messageDialog.value.severityValues[severity];
    }

    //funciones para cuando se selecciona o deselecciona un ciclo
    function onCicloSelect(event){
        cicloEditarSelected.value = event.data;
        indexDataEditing = event.index;

        visibleDialogEditCicloFormacion.value = true;
    }

    function onCicloUnselect(event){
        
    }

    //funciones para cuando se selecciona o deselecciona un icono informativo
    function onIconInfoSelect(event){
        iconEditarSelected.value = event.data;
        indexDataEditing = event.index;
        visibleDialogEditIconInfo.value = true;
    }

    function onIconInfoUnselect(event){
        iconEditarSelected.value = null;
    }


    //funciones para editar o eliminar un ciclo seleccionado
    function deleteCicloEdit(){
        try {
            carreraEditar.value.datos.ciclos_formacion.splice(indexDataEditing,1);
            visibleDialogEditCicloFormacion.value = false;

        } catch (error) {
            console.error(error);
        }
    }

    function deleteIconEdit(){
        try {
            carreraEditar.value.datos.pagina_principal.tarjetas_informativas_pp.splice(indexDataEditing,1);
            visibleDialogEditIconInfo.value = false;
        } catch (error) {
            console.error(error);
        }
    }

    //funciones para cargar los conocimientos, habilidades y actitudes de la base de datos

    function loadConocimientos(){
      //obtener los conocimientos de la base de datos
      axios.post(props.url_carreraConocimientos)
      .then(function(response){
        const conocimientosLoaded = response.data;
        conocimientosCarrera.value = conocimientosLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){

      });
    }

    function loadHabilidades(){
      //obtener las habilidades de la base de datos
      axios.post(props.url_carreraHabilidades)
      .then(function(response){
        const habilidadesLoaded = response.data;
        habilidadesCarrera.value = habilidadesLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){
      });
    }

    function loadActitudes(){
      //obtener las actitudes de la base de datos
      axios.post(props.url_carreraActitudes)
      .then(function(response){
        const actitudesLoaded = response.data; 
        actitudesCarrera.value = actitudesLoaded;

      }).catch(function(error){

        console.error(error);

      }).finally(function(){

      });
    }

    //funciones para agregar un ciclo de formacion o un icono informativo en la edicion
    function addCicloFormacion(){
        carreraEditar.value.datos.ciclos_formacion.push(cicloFormacionAgregar.value);
        cicloFormacionAgregar.value = {
            numero_ciclo:1,
            descripcion:'',
        };
    }

    function addIconoInformativo(){
        carreraEditar.value.datos.pagina_principal.tarjetas_informativas_pp.push(iconoInformativoAgregar.value);
        iconoInformativoAgregar.value = {
            descripcion:'',
            url_direccion_imagen:'',
        };
    }
    


    // Retornar datos y métodos que deseas utilizar en la plantilla
    return {
        carrerasLoaded,
        visibleDialogDelete,
        carreraEliminar,
        carreraEditar,
        visibleDialogEdit,
        visibleDialogConfirEdit,
        visibleDialogConfirmDelete,
        confirmEliminacionCarrera,
        confirmEdicionCarrera,
        cicloEditarSelected,//para modificar los ciclos 
        iconEditarSelected,//para modificar los iconos informativos
        visibleDialogEditCicloFormacion,
        visibleDialogEditIconInfo,
        visibleDialogMessage,
        conocimientosCarrera,
        habilidadesCarrera,
        actitudesCarrera,
        cicloFormacionAgregar,
        iconoInformativoAgregar,
        messageDialog,
        visibleSpinnerDialog,
        onCicloSelect,
        onCicloUnselect,
        onIconInfoSelect,
        onIconInfoUnselect,
        getCarreras,
        eliminarCarrera,
        editarCarrera,
        ejecutaEliminacion,
        ejecutaEdicion,
        confirmaEidicion,
        confirmaEliminacion,
        deleteCicloEdit,
        deleteIconEdit,
        //metodos para cargar los conocimientos, habilidades y actitudes de la base de datos
        loadConocimientos,
        loadHabilidades,
        loadActitudes,
        addCicloFormacion,
        addIconoInformativo
    };
  },
  beforeMount(){
    this.getCarreras(); //cargar todos los registros de las carreras guardadas
    this.loadConocimientos();//cargar los conocimientos de la base de datos
    this.loadHabilidades();//cargar las habilidades de la base de datos
    this.loadActitudes();//cargar las actitudes de la base de datos
  },

  // Lifecycle hooks (opcional)
  // Puedes utilizar los hooks como onCreated, onMounted, onUpdated, etc.
  // Ejemplo:
  // onCreated() {
  //   console.log('El componente ha sido creado');
  // },

  // Filtros (opcional)
  // Puedes utilizar el método setup para definir filtros personalizados.
  // Ejemplo:
  // setup() {
  //   Vue.filter('uppercase', (value) => {
  //     return value.toUpperCase();
  //   });
  // },

  // Directivas (opcional)
  // Puedes definir directivas personalizadas para este componente.
  // Ejemplo:
  // directives: {
  //   focus: {
  //     // Definición de la directiva
  //     // ...
  //   },
  // },

  // Otras opciones del componente (opcional)
  // Puedes definir otras opciones según tus necesidades.
});
</script>

<style lang="scss" scoped>
.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    /* Para dar un espacio uniforme entre los cards */
}


.card {

/* Esto permite que cada card tome el espacio necesario y se expanda según el contenido */
margin: 10px;
/* Espacio alrededor de cada card */
width: 30em;
margin-bottom: 40px;
}

.imagen-resolucion {
    width: 90%;
    height: width;
}


.centrar{
    display: flex;
    justify-content: center;
    align-items: center;

}

/*para darle forma a los items que representaran la paleta de colores de la carrera*/
.item{
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    border: 1px solid black;
    margin: 2px 2px 2px 2px;
}

.lista-iconos-informativos{
    list-style: none;
}

.item-icono-informativo:hover{
    cursor: pointer;
}

.row-div{
    display: flex;
    flex-direction: row;
    align-items: center;
}

.length-input-text{
    width: 80%;
}

.btn-dialog-actions{
    width: 25%;
}

.distribucion-uniforme{
    display: flex;
    justify-content: space-around;
    align-items: center;
}


.container-imagen-carrera-eliminar, .container-imagen-carrera-editar{
    padding: 1%;
}

.estilo-imagen{
    border-radius: 5%;
}
 
</style>
