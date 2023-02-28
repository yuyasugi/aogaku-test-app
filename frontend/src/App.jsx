import React from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";

import { Home } from "./components/Home";
import { SubjectPracticeList } from "./components/SubjectPracticeList";
import { ReferenceBookPracticeList } from "./components/ReferenceBookPracticeList";
import { UnitPracticeList } from "./components/UnitPracticeList";
import { IssueList } from "./components/IssueList";
import { SubjectTestList } from "./components/SubjectTestList";
import { ReferenceBookTestList } from "./components/ReferenceBookTestList";
import { UnitTestList } from "./components/UnitTestList";
import { IssueTestList } from "./components/IssueTestList";
import { AdminHome } from "./components/AdminHome";
import { AdminUserResultList } from "./components/AdminUserResultList";
import { AdminEditSubjectList } from "./components/AdminEditSubjectList";
import { AdminEditReferenceBookList } from "./components/AdminEditReferenceBookList";
import { AdminEditUnitList } from "./components/AdminEditUnitList";
import { AdminEditIssueList } from "./components/AdminEditIssueList";
import { AdminEditProblem } from "./components/AdminEditProblem";

const App = () => {

  return (
    <BrowserRouter>
        <div className="App">
        </div>
        <Switch>
            <Route exact path="/">
                <Home />
            </Route>

            <Route path="/subject_test">
                <SubjectTestList />
            </Route>
            <Route path="/subject_practice">
                <SubjectPracticeList />
            </Route>

            <Route path="/reference_book_test/:subject_id">
                <ReferenceBookTestList />
            </Route>
            <Route path="/reference_book_practice/:subject_id">
                <ReferenceBookPracticeList />
            </Route>

            <Route path="/unit_test/:reference_book_id">
                <UnitTestList />
            </Route>
            <Route path="/unit_practice/:reference_book_id">
                <UnitPracticeList />
            </Route>

            <Route path="/issue_test/:unit_id">
                <IssueTestList />
            </Route>
            <Route path="/issue/:unit_id">
                <IssueList />
            </Route>



            <Route exact path="/admin">
                <AdminHome />
            </Route>
            <Route exact path="/admin/user_result/:user_id">
                <AdminUserResultList />
            </Route>
            <Route exact path="/admin/edit_subject">
                <AdminEditSubjectList />
            </Route>
            <Route exact path="/admin/edit_reference_book/:subject_id">
                <AdminEditReferenceBookList />
            </Route>
            <Route exact path="/admin/edit_unit/:reference_book_id">
                <AdminEditUnitList />
            </Route>
            <Route exact path="/admin/edit_issue/:unit_id">
                <AdminEditIssueList />
            </Route>
            <Route exact path="/admin/edit/:id">
                <AdminEditProblem />
            </Route>
        </Switch>
    </BrowserRouter>
  );
}

export default App;
