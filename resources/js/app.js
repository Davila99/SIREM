import React from 'react';
import ReactDOM from 'react-dom/client';

require("./bootstrap");

import "sweetalert2/src/sweetalert2.scss";


import { initializeDataTable } from "./funciones";
import ReporteMatriculas from "./components/reportes/ReporteMatriculas";
import ReporteCalificaciones from './components/reportes/ReporteCalificaciones';
import ReporteAcademia from './components/reportes/ReporteAcademia';

initializeDataTable();
window.Swal = require("sweetalert2");

if (document.getElementById("reactapp")) {
    const appReact = document.getElementById("reactapp");
    const root = ReactDOM.createRoot(appReact);
    root.render(<ReporteMatriculas />);
}
if (document.getElementById('reporteCalificaciones')) {
    const appReact = document.getElementById('reporteCalificaciones');
    const root = ReactDOM.createRoot(appReact);
    root.render(<ReporteCalificaciones />);
  }
  if (document.getElementById('reporteAcademia')) {
    const appReact = document.getElementById('reporteAcademia');
    const root = ReactDOM.createRoot(appReact);
    root.render(<ReporteAcademia/>);
  }