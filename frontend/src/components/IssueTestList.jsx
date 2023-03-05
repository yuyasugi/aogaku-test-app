import React, { useEffect, useState } from "react";
import { useParams, useHistory } from "react-router-dom"
import axios from "axios";
import { Button, ChakraProvider, FormControl, FormLabel, Input, Heading, Box } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import styled from "styled-components";


export const IssueTestList = () => {
    const { unit_id } = useParams();
    const history = useHistory();
    const url = `http://localhost:8888/api/issue_test/${unit_id}`;

    const [issueList, setIssueList] = useState([])

    const [answers, setAnswers] = useState([])

    const [resultList, setResultList] = useState([])

    const onChangeInput = (answer, issueId) => {
    setAnswers([{issueId, answer}, ...answers.filter((a) => a.issueId !== issueId )] );
      }

    const onClickHome = async () => {
        history.push('/');
    }

    const onClickAdd = async () => {
        const res = await axios.post(`http://localhost:8888/api/result_test`,{answers, unit_id});
        console.log(res);
        setResultList(res.data.issueResult);
    }

    useEffect(() => {
        ;(async () => {
        try {
            const res = await axios.get(url)
            setIssueList(res.data.unitIssue)
            // console.log("res",res)
            setAnswers(
              res.data.unitIssue.map((issue) => {
                return {
                  issueId: issue.id,
                  answer: null
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
                <Heading size='md' pt={5}>（）の中に入るものを解答してください。</Heading>
                <FormControl>
                {issueList.map((s) => {
            return (
                <Box key={s.id}>
                    <FormLabel pt={10}>{s.problem}</FormLabel>
                    <Input onChange={(e) => onChangeInput(e.target.value, s.id)} type='text' focusBorderColor='lime' placeholder='解答を入力してください' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
                    <Box color='red'>
                        {resultList.length > 0 && resultList.find(r => r.issue_id === s.id)?.commentary}
                    </Box>
                </Box>
                    )})}
                    {
                    resultList.length > 0 ? (
                    <Button mt={4} colorScheme="teal" onClick={onClickHome} type="submit">
                        HOMEへ
                    </Button>
                    ) : (
                    <Button mt={4} colorScheme="teal" onClick={onClickAdd} type="submit">
                        解答する
                    </Button>
                    )
                    }
                </FormControl>
            </SContainer>
        </ChakraProvider>
        )
    }

    const SContainer = styled.div`
    background-color: rgba(1, 75, 21, 40%);
    height: 100%;
    width: 100%;
    `
