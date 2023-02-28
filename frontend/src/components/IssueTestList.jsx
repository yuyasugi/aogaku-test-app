import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";


    export const IssueTestList = () => {
        const { unit_id } = useParams();
        const url = `http://localhost:8888/api/issue_test/${unit_id}`;
        const [issueTestList, setIssueTestList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.unitIssue);
            setIssueTestList(res.data.unitIssue)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("issueTestList",issueTestList);

    return  (
        <div>
        {issueTestList.map((s) => {
            return (
            <div>{s.problem}</div>
            )})}
        </div>
        )
    }
