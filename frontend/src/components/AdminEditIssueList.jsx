import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";
import { Box, Link } from "@chakra-ui/react";


    export const AdminEditIssueList = () => {
        const { unit_id } = useParams();
        const url = `http://localhost:8888/api/edit_issue/${unit_id}`;
        const [adminEditIssueList, setAdminEditIssueList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.unitIssue);
            setAdminEditIssueList(res.data.unitIssue)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminEditIssueList",adminEditIssueList);

    return  (
        <Box>
        {adminEditIssueList.map((s) => {
            return (
            <Link href={`http://localhost:3000/admin/edit/${s.id}`}>{s.problem}</Link>
            )})}
        </Box>
        )
    }
