import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";
import { Button, ChakraProvider, FormControl, FormLabel, Input } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import styled from "styled-components";


    export const IssueList = () => {
        const { unit_id } = useParams();
        const url = `http://localhost:8888/api/issue/${unit_id}`;
        const [issueList, setIssueList] = useState([])

        const [answers, setAnswers] = useState([])

        const onChangeInput = (answer, issueId) => {
            console.log('answers', answers)
            console.log('answer', answer)
            console.log('issueId', issueId)
            console.log('answers', answers)
        setAnswers([{issueId, answer}, ...answers.filter((a) => a.issueId !== issueId )] );
          }

        const onClickAdd = async () => {
            console.log(answers);
            // const res = await axios.post(`http://localhost:8888/api/result`,{answers})

        }

        useEffect(() => {
            ;(async () => {
            try {
                const res = await axios.get(url)
                setIssueList(res.data.unitIssue)
                console.log("res",res)
                setAnswers(
                  res.data.unitIssue.map((issue) => {
                    return {
                      issueId: issue.id,
                      answer: null,
                    }
                  })
                )
              } catch (e) {
                return e
              }
            })()
          }, [])

    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <FormControl>
                {issueList.map((s) => {
            return (
                <>
                    <FormLabel>{s.problem}</FormLabel>
                    <Input onChange={(e) => onChangeInput(e.target.value, s.id)} type='text' focusBorderColor='lime' placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' />
                </>
                    )})}
                    <Button mt={4} colorScheme="teal" onClick={onClickAdd} type="submit">
                        解答する
                    </Button>
                </FormControl>
                </>
            </SContainer>
        </ChakraProvider>
        )
    }

    const SContainer = styled.div`
    background-color: rgba(1, 75, 21, 40%);
    height: 100%;
    width: 100%;
    `
