<template>
    <footer id="footer" class="w-100">
        <div class="footer-text">
            Background gif from <a href="https://radio.x-team.com/"><strong style="color: #FFF01F">X-TEAM</strong></a> /
            © 2021 Copyright:
            <a href="https://www.instagram.com/ver.nom/"><strong style="color: lawngreen; text-decoration: underline">VER.NOM</strong></a>
        </div>
    </footer>
</template>

<script>
export default {}
</script>

<style>
footer {
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    text-align: center;
    position: absolute;
    bottom: 0;
    font-size: 13px;
    font-weight: 300;
}

.footer-text {
    padding: 0.5rem;
    font-size: 13px;
}

@media only screen and (max-width: 768px) {
    footer {
        position: initial;
    }
}
</style>
