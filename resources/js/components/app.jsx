import React from 'react'

import '../../css/app.css'
import BuscadorEmpleados from './empleados/BuscadorEmpleados'


const app = () => {
  return (
    <div>
      <BuscadorEstudiantes/>
      <BuscadorEmpleados/>
      <CrearEstudiante/>
    </div>
  )
}

export default app
