@extends('layouts.FronendMaster');
<style>
body::-webkit-scrollbar {
    display: none;
}

body {


    margin: 0 !important;
    padding: 0 !important;
    /* background-color: #000000; */
    /* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1092%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(205%2c 205%2c 205%2c 1)'%3e%3c/rect%3e%3cuse xlink:href='%23SvgjsSymbol1099' x='0' y='0'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsSymbol1099' x='720' y='0'%3e%3c/use%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1092'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpath d='M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z' id='SvgjsPath1097'%3e%3c/path%3e%3cpath d='M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z' id='SvgjsPath1095'%3e%3c/path%3e%3cpath d='M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z' id='SvgjsPath1096'%3e%3c/path%3e%3cpath d='M2 -2 L-2 2z' id='SvgjsPath1094'%3e%3c/path%3e%3cpath d='M6 -6 L-6 6z' id='SvgjsPath1093'%3e%3c/path%3e%3cpath d='M30 -30 L-30 30z' id='SvgjsPath1098'%3e%3c/path%3e%3c/defs%3e%3csymbol id='SvgjsSymbol1099'%3e%3cuse xlink:href='%23SvgjsPath1093' x='30' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='30' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='30' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='30' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='30' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='30' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='30' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='30' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='30' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='30' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='90' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='90' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='90' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='90' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='90' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='90' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='90' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='90' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='90' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='90' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1098' x='150' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='150' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='150' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='150' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='150' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='150' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='150' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='150' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='150' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='150' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='210' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='210' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='210' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='210' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='210' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1098' x='210' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='210' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='210' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='210' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='210' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='270' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='270' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1098' x='270' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='270' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='270' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1098' x='270' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='270' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='270' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='270' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='270' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='330' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='330' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1098' x='330' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='330' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='330' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='330' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='330' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='330' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='330' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='330' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='390' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='390' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='390' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='390' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='390' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='390' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='390' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='390' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='390' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='390' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='450' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='450' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='450' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='450' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='450' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='450' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='450' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='450' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='450' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='450' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='510' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='510' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='510' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='510' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='570' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='570' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='570' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='570' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='570' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='570' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='570' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='570' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='570' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='570' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='630' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='630' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='630' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='630' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='630' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='630' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='630' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='630' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='630' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='630' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1097' x='690' y='30' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='690' y='90' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='690' y='150' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='690' y='210' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='690' y='270' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='690' y='330' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1094' x='690' y='390' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1095' x='690' y='450' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1093' x='690' y='510' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1096' x='690' y='570' stroke='rgba(49%2c 62%2c 211%2c 0.31)'%3e%3c/use%3e%3c/symbol%3e%3c/svg%3e"); */
    background-attachment: fixed;
    background-size: cover;
    background-blend-mode: screen;
}

@import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700);

#el:before {

    background: #c50000;
    background: -webkit-linear-gradient(right, #bd0000, #7ABE2E);
    background: -moz-linear-gradient(right, #941212, #7ABE2E);
    background: linear-gradient(to left, #cc0000, #7ABE2E);
    border-radius: 200px 200px 0 0;
    box-shadow: 0px 1px 10px rgba(255, 255, 255, 0.15) inset;
    content: "";
    height: 200px;
    position: absolute;
    width: 400px;
}

#el {
    border-radius: 200px 200px 0 0;
    height: 300px;
    /* margin: 5px auto 0; */
    overflow: hidden;
    position: absolute;
    width: 400px;

}

#el:after {
    background: #041e43;
    border-radius: 200px 200px 0 0;
    bottom: 100px;
    /* box-shadow: 3px 1px 8px rgba(0, 0, 0, 0.15); */
    color: #ffffff;
    content: attr(data-value);
    font-family: Lato, Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 2.5em;
    font-weight: 300;
    height: 150px;
    left: 50px;
    line-height: 200px;
    position: absolute;
    text-align: center;
    width: 300px;
    z-index: 3;
}

#needle {
    background: #fff;
    border-radius: 10px;
    bottom: 100px;
    box-shadow: 2px -0px 10px #ffffff;
    display: block;
    height: 5px;
    left: 10px;
    position: absolute;
    width: 190px;
    transform-origin: 100% 5px;
    transform: rotate(0deg);
    transition: all 1s;
}
</style>
@section('content')
<section class="bg-transparent">
    <div class="container-fluid">
        <!-- <div class="container"> -->
        <div class="row justify-content-center">
            <img src="{{asset('frontend/img/oneview.png')}}" class="mt-md-4 pt-md-5 rounded" alt="" style="width: 81%;">
        </div>
        <!-- </div> -->
        <h2 class="text-center pt-lg-3 mb-lg-4">
            One View
        </h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-gray">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h4 class="mb-0 text-center text-light">Add Your Existing Loan Detials</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="basic-form">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Name of
                                                the Bank
                                            </label>
                                            <input class="form-control" id="bnkNme" type="text" required>
                                            <small class="bnkNme text-danger" hidden>Required*</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Type of
                                                Loan
                                            </label>
                                            <input class="form-control" id="loanTyp" type="text" required>
                                            <small class="loanTyp text-danger" hidden>Required*</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Loan
                                                Amount
                                            </label>
                                            <input type="text" id="amnt" class="form-control" placeholder=""
                                                value="" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">MM/YY of First Emi
                                            </label>
                                            <input type="text" id="loanTke" class="form-control" placeholder=""
                                                onfocus="this.type='month'" onblur="this.type='text'" value="2021-05" required>
                                            <input type="month" class="form-control" name="bday-month"
                                                value="2017-06" onfocus="this.type='month'"
                                                onblur="this.type='text'" required>
                                            <small class="loanTke text-danger" hidden>Required*</small>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">ROI</label>
                                            <input type="text" id="roi" class="form-control" placeholder="In %"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Tenure
                                            </label>
                                            <input type="text" id="tenure" class="form-control"
                                                placeholder="In Months" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">EMI
                                            </label>
                                            <input type="text" id="emi" class="form-control"
                                                placeholder="From Your Loan Taken Date"
                                                style="background: transparent;" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Upload Your
                                                Schedule
                                            </label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-md-4">
                                    <div class="col-md-12 text-center">
                                        <button type="button" id="getEmi" class="btn btn-darkblue calc"><b>Get
                                                Emi</b></button>
                                        <button type="submit" id="add" class="btn btn-success">Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-light pt-0">
    <div class="container">
        <div class="row align-items-center">
            <img src="../img/meter.png" class="rounded" alt="" style="width: 100%;">
        </div>
        <h3 class="text-center pb-md-5 pt-md-5">EMI Meter</h3>
        <div class="row">
            <div class="col-md-4">
                <br>
                <input type="number" id="income" class="form-control bi-alarm" name="fullname"
                    placeholder="Net Monthly Income" required> <br>
                <input type="number" id="tot_emi" name="" class="form-control" placeholder="Total Emi Obligations"
                    required /> <br>
                <input type="number" id="outstand" name="" class="form-control"
                    placeholder="Latest Credit Outstanding" required /> <br>
                <div class="text-center">
                    <button type="button" class="btn btn-darkblue" id="calc"><b>Calculate</b></button>
                </div>
            </div>
            <div class="col-md-4">
                <div id="el" class="" data-value="0%">
                    <span id="needle"></span>
                </div>
            </div>
            <div class="col-md-4"><br>
                <div class="card-body text-center">
                    <p>Your Current Obligation Ratio is : <span class="font-weight-bold" id="ratio">0.00</span>
                    </p>
                    <hr>
                    <p>Personal Loan Eligibility : <span class="font-weight-bold" id="personalEligible">0.00</span>
                    </p>
                    <hr>
                    <p>Home Loan Eligibility : <span class="font-weight-bold" id="homeEligible">0.00</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- <hr>
        <div class="row">
            <div class="col-6">
                <div class="card has-shadow">
                    <div class="card-body text-center">
                        <h5>Your Current Obligation Ratio is : <span class="font-weight-bold" id="ratio">0.00</span>
                        </h5>
                        <h5>Personal Loan Eligibility : <span class="font-weight-bold"
                                id="personalEligible">0.00</span>
                        </h5>
                        <h5>Home Loan Eligibility : <span class="font-weight-bold" id="homeEligible">0.00</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4 text-center text-dark">One View Table</h3>
                <div class="table-responsive rounded bg-gray">
                    <table class="table align-items-center small text-light">
                        <thead class="">
                            <tr>
                                <th class="">S.no</th>
                                <th class="">Lender Name</th>
                                <th class="">Loan Type</th>
                                <th class="">First EMI</th>
                                <th class="">Loan Amount</th>
                                <th class="">ROI</th>
                                <th class="">Tenure</th>
                                <th class="">EMI</th>
                                {{-- <th class="">Schedule</th> --}}
                            </tr>
                        </thead>
                        <tbody id="frontend_existing_loan_detail">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!--================================= Scripting=================================================== -->

<script>
    //=================================
    $(function() {
        $('#header').load('header.html');
        $('#footer').load('footer.html');
    });
    //=================================

    AOS.init();
    //Add Your Existing Loan Detials============================
    $(".calc").click(function() {

        let valid = true;
        let loanTyp = $('#loanTyp').val();
        let bnkNme = $('#loanTyp').val();
        let loanTke = $('#loanTke').val();

        let P = parseInt($('#amnt').val());
        let rate = parseInt($('#roi').val());
        let n = parseInt($('#tenure').val());

        // let n = tkeMnth + tenure;

        let r = rate / (12 * 100);
        let prate = (P * r * Math.pow((1 + r), n)) / (Math.pow((1 + r), n) - 1);
        let emi = (Math.ceil(prate * 100) / 100).toFixed(0);

        emi = isNaN(emi) ? 'Enter The Valid Amount' : '₹ ' + emi;
        $('#emi').val(emi);
    });
    //Add Your Existing Loan Detials============================

    //Eligible Calculator================================
    $("#calc").click(function() {
        let salary = parseInt($('#income').val());
        let obligate = parseInt($('#tot_emi').val());
        let card_outstanding = parseInt($('#outstand').val());

        let Total_obligate = (0.05 * card_outstanding) + obligate;

        // Personal Loan Eligibility
        let value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) -
            Total_obligate);
        let result = (parseInt((value / 2175) * 1e5));
        result = isNaN(result) ? 0 : result;
        $('#personalEligible').text(result <= 0 ? 'not Eligible' : ': ₹ ' + result.toFixed(0));
        // Personal Loan Eligibility

        // Home Loan Eligiblity
        let h_salary = parseInt($('#income').val()) * 0.7;
        let h_value = h_salary - Total_obligate;
        let h_result = (parseInt((h_value / 2175) * 1e5));
        h_result = isNaN(result) ? 0 : h_result;
        $('#homeEligible').text(result <= 0 ? 'not Eligible' : ': ₹ ' + h_result.toFixed(0));
        // Home Loan Eligiblity

        // ========Emi Meter========
        if (result > 0) {
            let percent = ((((0.05 * card_outstanding) + obligate) / salary) * 100);
            let val = isNaN(percent) ? 0 : percent.toFixed(0);

            $({
                Counter: 0
            }).animate({
                Counter: val,
            }, {
                duration: 1000,
                easing: 'swing',
                step: function() {
                    $('#el').attr("data-value", Math.round(this.Counter) + ' %');
                    $('#ratio').text(Math.round(this.Counter) + ' %');
                }
            });

            $("#el span").css({
                "transform": "rotate(0deg)",
                "transform": "rotate(" + val * 1.8 + "deg)"
            });
        }
        // ========Emi Meter========
    });
    //Eligible Calculator================================
    </script>



    <!--================================= Scripting=================================================== -->
