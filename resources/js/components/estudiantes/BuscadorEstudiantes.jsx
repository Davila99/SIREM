
import React, {useState, useEffect} from 'react'
function BuscadorEstudiantes() {
    const [ users, setUsers ] = useState([])
    const [ search, setSearch ] = useState("")
  
    //función para traer los datos de la API
    const URL = 'https://jsonplaceholder.typicode.com/users'
  
    const showData = async () => {
      const response = await fetch(URL)
      const data = await response.json()
      //console.log(data)
      setUsers(data)
    }   
     //función de búsqueda
    const searcher = (e) => {
        setSearch(e.target.value)   
    }
     //metodo de filtrado 2   
     const results = !search ? users : users.filter((dato)=> dato.name.toLowerCase().includes(search.toLocaleLowerCase()))
    
     useEffect( ()=> {
      showData()
    }, [])
    return ( 
        <div>
        <input value={search} onChange={searcher} type="text" placeholder='Search' className='form-control'/>
    
        <table className='table table-striped table-hover mt-5 shadow-lg'>
            <thead>
                <tr className='bg-curso text-white'>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                { results.map( (user) => (
                    <tr key={user.id}>
                        <td>{user.name}</td>
                        <td>{user.username}</td>
                    </tr>                    
                ))}
            </tbody>
        </table>
    </div>
     );
}

export default BuscadorEstudiantes;