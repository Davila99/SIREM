import React from 'react'

import '../../css/app.css'
import BuscadorEmpleados from './empleados/BuscadorEmpleados'
import BuscadorMatriculas from './matriculas/BuscadorMatriculas'


const app = () => {
  return (
    <div>
      <BuscadorEstudiantes/>
      <BuscadorEmpleados/>
      <CrearEstudiante/>
      <BuscadorMatriculas/>
    </div>
  )
}

export default app
