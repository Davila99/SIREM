
import React from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const PivotTable = ({ data }) => {
  return (
    <div className="row">
      <div className="col-md-12">
        <PivotTableUI data={data} />
      </div>
    </div>
  );
};

export default PivotTable;
