import React from 'react'

const BuscadorMatriculas = () => {
  const [matriculas, setMatriculas] = useState([]);
  const [search, setSearch] = useState("");

  const URL = "http://127.0.0.1:8000/search-matriculas";

  const getMatriculas = async () => {
      const response = await fetch(URL);
      const data = await response.json();
      setMatriculas(data.matriculas.data);
  };
  console.log(matriculas);
  const searcher = (e) => {
      setSearch(e.target.value);
  };

  const results = !search
      ? matriculas
      : matriculas.filter((dato) =>
            dato.matriculas.toLowerCase().includes(search.toLocaleLowerCase())
        );
  useEffect(() => {
      getMatriculas();
  }, []);
  return (
      <div>
          <input
              value={search}
              onChange={searcher}
              type="text"
              placeholder="Search"
              className="form-control"
          />

          <table className="table table-striped table-hover mt-5 shadow-lg">
              <thead>
                  <tr className="bg-curso text-white">
                      <th>Estudiantes</th>
                      <th>Grupo</th>
                      
                  </tr>
              </thead>
              <tbody>
                  {results.map((matricula) => (
                      <tr key={matricula.id}>
                          <td>{matricula.estudiante}</td>
                          <td>{matricula.grupo}</td>
                      </tr>
                  ))}
              </tbody>
          </table>
      </div>
  );
}

export default BuscadorMatriculas