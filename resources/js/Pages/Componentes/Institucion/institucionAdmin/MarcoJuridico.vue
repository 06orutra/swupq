<script setup>
import estructuraImg from '@/Pages/Componentes/Home/estructurapdf2.vue';
</script>

<template>
    <TabView ref="tabview1" class="p-3">
        <TabPanel header="Constitucion" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/ConstitucionDocumentos/bannerData'" :registerBannerUrl="'/ConstitucionDocumentos/registrarBanner'"
                :editBannerUrl="'/ConstitucionDocumentos/editarBanner'" :deleteBannerUrl="'/ConstitucionDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Tratados Internaciones" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/TratadosInternacionalesDocumentos/bannerData'" :registerBannerUrl="'/TratadosInternacionalesDocumentos/registrarBanner'"
                :editBannerUrl="'/TratadosInternacionalesDocumentos/editarBanner'" :deleteBannerUrl="'/TratadosInternacionalesDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Leyes" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Estatales</span>
            </p>
            <estructuraImg :loadDataUrl="'/LeyesEstatales/bannerData'" :registerBannerUrl="'/LeyesEstatales/registrarBanner'"
                :editBannerUrl="'/LeyesEstatales/editarBanner'" :deleteBannerUrl="'/LeyesEstatales/eliminarBanner'" />
                <hr class="blue-divider">
                <p>
                <span style="color: #007bff; font-weight: bold;">Generales</span>
            </p>
            <estructuraImg :loadDataUrl="'/LeyesGenerales/bannerData'" :registerBannerUrl="'/LeyesGenerales/registrarBanner'"
                :editBannerUrl="'/LeyesGenerales/editarBanner'" :deleteBannerUrl="'/LeyesGenerales/eliminarBanner'" />
                <hr class="blue-divider">
                <p>
                <span style="color: #007bff; font-weight: bold;">Federales</span>
            </p>
            <estructuraImg :loadDataUrl="'/LeyesFederales/bannerData'" :registerBannerUrl="'/LeyesFederales/registrarBanner'"
                :editBannerUrl="'/LeyesFederales/editarBanner'" :deleteBannerUrl="'/LeyesFederales/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Acuerdos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/AcuerdosDocumentos/bannerData'" :registerBannerUrl="'/AcuerdosDocumentos/registrarBanner'"
                :editBannerUrl="'/AcuerdosDocumentos/editarBanner'" :deleteBannerUrl="'/AcuerdosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Catalogo" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/CatalogoDocumentos/bannerData'" :registerBannerUrl="'/CatalogoDocumentos/registrarBanner'"
                :editBannerUrl="'/CatalogoDocumentos/editarBanner'" :deleteBannerUrl="'/CatalogoDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Circulares" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/CircularesDocumentos/bannerData'" :registerBannerUrl="'/CircularesDocumentos/registrarBanner'"
                :editBannerUrl="'/CircularesDocumentos/editarBanner'" :deleteBannerUrl="'/CircularesDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Convenios Institucionales" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/ConveniosInstitucionalesDocumentos/bannerData'" :registerBannerUrl="'/ConveniosInstitucionalesDocumentos/registrarBanner'"
                :editBannerUrl="'/ConveniosInstitucionalesDocumentos/editarBanner'" :deleteBannerUrl="'/ConveniosInstitucionalesDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Codigos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/CodigosDocumentos/bannerData'" :registerBannerUrl="'/CodigosDocumentos/registrarBanner'"
                :editBannerUrl="'/CodigosDocumentos/editarBanner'" :deleteBannerUrl="'/CodigosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Decretos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/DecretosDocumentos/bannerData'" :registerBannerUrl="'/DecretosDocumentos/registrarBanner'"
                :editBannerUrl="'/DecretosDocumentos/editarBanner'" :deleteBannerUrl="'/DecretosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>


        <TabPanel header="Lineamientos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/LineamientosDocumentos/bannerData'" :registerBannerUrl="'/LineamientosDocumentos/registrarBanner'"
                :editBannerUrl="'/LineamientosDocumentos/editarBanner'" :deleteBannerUrl="'/LineamientosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Manuales" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/ManualesDocumentos/bannerData'" :registerBannerUrl="'/ManualesDocumentos/registrarBanner'"
                :editBannerUrl="'/ManualesDocumentos/editarBanner'" :deleteBannerUrl="'/ManualesDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Plan De Desarollo Institucional" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/PlanDeDesarolloInstitucionalDocumentos/bannerData'" :registerBannerUrl="'/PlanDeDesarolloInstitucionalDocumentos/registrarBanner'"
                :editBannerUrl="'/PlanDeDesarolloInstitucionalDocumentos/editarBanner'" :deleteBannerUrl="'/PlanDeDesarolloInstitucionalDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Protocolos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/ProtocolosDocumentos/bannerData'" :registerBannerUrl="'/ProtocolosDocumentos/registrarBanner'"
                :editBannerUrl="'/ProtocolosDocumentos/editarBanner'" :deleteBannerUrl="'/ProtocolosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
        <TabPanel header="Reglamentos" >
            <hr class="blue-divider">
            <p>
                <span style="color: #007bff; font-weight: bold;">Documentos</span>
            </p>
            <estructuraImg :loadDataUrl="'/ReglamentosDocumentos/bannerData'" :registerBannerUrl="'/ReglamentosDocumentos/registrarBanner'"
                :editBannerUrl="'/ReglamentosDocumentos/editarBanner'" :deleteBannerUrl="'/ReglamentosDocumentos/eliminarBanner'" />
                <hr class="blue-divider">
        </TabPanel>
    </TabView>
</template>

<style scoped>
.blue-divider {
    border: 1px solid rgb(151, 151, 168);
    margin: 10px 0;
    /* Ajusta el margen superior e inferior según tus necesidades */
}
</style>
