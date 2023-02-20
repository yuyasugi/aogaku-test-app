import React, { useEffect, useState } from "react";
import axios from "axios";
import { Box, Card } from "@chakra-ui/react"


    export const SubjectPracticeList = ({subjectPracticeList}) => {
        console.log("subjectPracticeList",subjectPracticeList);
    return  (
        <div>
        {subjectPracticeList.map((s) => {
            return (
            <div>{s.name}</div>
            )})}
        </div>
        )
    }
