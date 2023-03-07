import React, { useEffect, useState } from "react";
import { useParams, useHistory } from "react-router-dom"
import axios from "axios";
import { Message } from "./organizm/Message";
import { Button, ChakraProvider, FormControl, FormLabel, Input, Textarea } from "@chakra-ui/react";


    export const AdminEditProblem = () => {
        const { id } = useParams();
        const url = `http://localhost:8888/api/edit/${id}`;
        const [adminEditProblem, setAdminEditProblem] = useState([])

        const [editProblem, setEditProblem] = useState("")
        const [editAnser, setEditAnser] = useState("")
        const [editCommentary, setEditCommentary] = useState("")

        const handleChangeProblrm = (e) => {
            setEditProblem(e.target.value);
          }
        const handleChangeAnser = (e) => {
            setEditAnser(e.target.value);
          }
        const handleChangeCommentary = (e) => {
            setEditCommentary(e.target.value);
          }

        const history = useHistory();
        const { showMessage } = Message();

        const onClickEdit = async () => {
            const res = await axios.post(`http://localhost:8888/api/update`,{editProblem, editAnser, editCommentary, id});
            console.log(res);
            showMessage({ title: "編集が完了しました", status: "success" });
        }

        const onClickDestroy = async () => {
            const res = await axios.post(`http://localhost:8888/api/destroy`,{id});
            console.log(res);
            showMessage({ title: "削除が完了しました", status: "success" });
            history.push('/admin/edit_subject');
        }

        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.issue);
            setAdminEditProblem(res.data.issue)
            setEditProblem(
                res.data.issue.map((issue) => {
                    return{
                        editProblem: issue.problem
                    }
                })
            )
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminEditProblem",adminEditProblem);

    return  (
        <ChakraProvider>
            <FormControl>
            <FormLabel>問題文</FormLabel>
            <Input defaultValue={adminEditProblem.problem} onChange={handleChangeProblrm} type='text' focusBorderColor='lime' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解答</FormLabel>
            <Input defaultValue={adminEditProblem.anser} onChange={handleChangeAnser} type='text' focusBorderColor='lime' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off"/>
            <FormLabel>解説</FormLabel>
            <Textarea defaultValue={adminEditProblem.commentary} onChange={handleChangeCommentary} type='text' focusBorderColor='lime' bg='whiteAlpha.800' my={2} width='99%' autoComplete="off" pt={6}/>
            <Button onClick={onClickEdit} mt={4} colorScheme="teal" type="submit">
                問題を編集する
            </Button>
            <Button onClick={onClickDestroy} mt={4} colorScheme="teal" type="submit">
                問題を削除する
            </Button>
            </FormControl>
        </ChakraProvider>
        )
    }
