<template>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <div class="sitios">
        <div class="content">
            <h1 class="title">Sitios de interés</h1>
            <div class="image-container">
                <img src="storage/img/sep.svg" alt="sep" height="60px">
                <img src="storage/img/conacyt.svg" alt="conacyt" height="60px">
                <img src="storage/img/coepes.svg" alt="coepes" height="50px">
                <img src="storage/img/conricyt.svg" alt="conricyt" height="50px">
                <img src="storage/img/concyteq.svg" alt="concyteq" height="60px">
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="imag">
                <img src="storage/img/queretaro.svg" alt="qro" height="100px">
                <img src="storage/img/utp.svg" alt="utp" height="100px">
                <img src="storage/img/igualdadlogo.svg" alt="igual" height="100px">
                <img src="storage/img/certificacionISO.svg" alt="iso" height="100px">
                <img src="storage/img/Promotor.png" alt="prom" height="100px">
                <img src="storage/img/transparencia.svg" alt="trans" height="100px">
                <img src="storage/img/avisoprivacidad.svg" alt="aviso" height="100px">
            </div>
            <div class="row">
                <div class="footer-col">
                    <h4></h4>
                    <p>Carretera Estatal 420 SN, El Marqués Querétaro</p>
                    <p>CP 7624</p>
                    <p>Télefono: 101 900</p>
                    <p>recepcion@upq.m</p>
                </div>
                <div class="footer-col">
                    <h4></h4>
                    <ul>
                        <li><a href="#">Historia</a></li>
                        <li><a href="#">Filosofía</a></li>
                        <li><a href="#">Ubicación</a></li>
                        <li><a href="#">Directorio</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4></h4>
                    <ul>
                        <li><a href="#">Difusión Universitaria</a></li>
                        <li><a href="#">Servicios Estudiantiles</a></li>
                        <li><a href="#">Información Pública</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Redes sociales</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body {
    line-height: 1.5;
    font-family: 'Poppins', sans-serif;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.sitios {
    text-align: center;
    margin-bottom: 20px;
    margin-bottom: 50px;
}

.content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.title {
    margin-bottom: 30px;
    font-size: 20px;
    font-weight: bold;
    color: #4F4E4E;
}

.image-container {
    display: flex;
    justify-content: center;
    gap: 50px;
}

.content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.container {
    max-width: 1170px;
    margin: auto;
}

.imag {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

ul {
    list-style: none;
}

.footer {
    background-color: #151930;
    padding: 70px 0;
}

.footer-col p {
    margin-bottom: 0px;
    font-size: 16px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease;
}

.footer-col {
    width: 25%;
    padding: 0 15px;
}

.footer-col h4 {
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom: 35px;
    font-weight: 500;
    position: relative;
}

.footer-col h4::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    background-color: #D81D38;
    height: 2px;
    box-sizing: border-box;
    width: 150px;
}

.footer-col ul li:not(:last-child) {
    margin-bottom: 10px;
}

.footer-col ul li a {
    font-size: 16px;
    text-transform: capitalize;
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease;
}

.footer-col ul li a:hover {
    color: #ffffff;
    padding-left: 8px;
}

.footer-col .social-links a {
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: rgba(255, 255, 255, 0.2);
    margin: 0 10px 10px 0;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: #ffffff;
    transition: all 0.5s ease;
}

.footer-col .social-links a:hover {
    color: #ffffff;
    background-color: #D81D38;
}

/*responsive*/
@media(max-width: 1017px) {
    .footer-col {
        width: 50%;
        margin-bottom: 30px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .image-container img {
        max-height: 80px;
    }

    .imag {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .imag img {
        max-height: 80px;
    }

}

@media(max-width: 574px) {
    .footer-col {
        width: 100%;
    }
}
</style>