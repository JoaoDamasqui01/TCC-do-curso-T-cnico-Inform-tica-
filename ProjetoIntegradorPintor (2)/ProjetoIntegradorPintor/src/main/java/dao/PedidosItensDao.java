package dao;

import model.Pedidos;
import model.PedidosItens;

import javax.persistence.EntityManager;
import java.util.List;

public class PedidosItensDao {
    private static EntityManager em;

    public PedidosItensDao (EntityManager em) {
        this.em = em;
    }

    public void cadastrar (PedidosItens pedidosItens) {
        this.em.persist(pedidosItens);
    }
    public List<PedidosItens> buscarTodos () {
        String jpql = "SELECT u FROM PedidosItens u";
        return em.createQuery(jpql, PedidosItens.class).getResultList();
    }
    public static PedidosItens buscarPorId(int id) {
        return em.find(PedidosItens.class,id);
    }
    public void excluir (PedidosItens pedidosItens) {
        em.merge(pedidosItens);
        this.em.remove(pedidosItens);
    }
    public static void alterar(PedidosItens pedidosItens) {
        em.merge(pedidosItens);
    }
}
