import React, { useEffect, useState } from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import axios from "axios";

import { Home } from "./components/Home";
import { SubjectPracticeList } from "./components/SubjectPracticeList";

const App = () => {
  const url = "http://localhost:8888/api/subject_practice";
  const [subjectPracticeList, setSubjectPracticeList] = useState([])
  useEffect(()=>{
    (async ()=>{
      try{
        const res = await axios.get(url);
	console.log(res.data.subjectPractice);
  setSubjectPracticeList(res.data.subjectPractice)
        return;
      }catch (e){
        return e;
      }
    })();
  },[]);

  return (
    <BrowserRouter>
        <div className="App">
        </div>
        <Switch>
            <Route exact path="/">
                <Home />
            </Route>
            <Route path="/subject_practice">
                <SubjectPracticeList subjectPracticeList={subjectPracticeList}/>
            </Route>
        </Switch>
    </BrowserRouter>
  );
}

export default App;
