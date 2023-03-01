import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";


    export const AdminUserResultList = () => {
        const { user_id } = useParams();
        const url = `http://localhost:8888/api/user_result/${user_id}`;
        const [adminUserResult, setadminUserResult] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.results);
            setadminUserResult(res.data.results)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminUserResult",adminUserResult);

    return  (
        <div>
        {adminUserResult.map((s) => {
            return (
                <>
                <div>{s.subjectName}</div>
                <div>{s.referenceBookName}</div>
                <div>{s.unitName}</div>
                <div>{s.score}/{s.issueCount}</div>
                </>
            )})}
        </div>
        )
    }
